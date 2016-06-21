<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Helper;
use Route;

use App\Models\User;
use App\Models\UserMeta;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sort = (isset($_GET['sort']) ? $_GET['sort'] : "created_at" );
		$direction = ( isset($_GET['direction']) ? $_GET['direction'] : "desc" );        
        $child_table = (isset($_GET['child_table'])?$_GET['child_table']:'');
        $search = (isset($_GET["search"])?$_GET["search"]:'');
        
        $query = "";
        if(!empty($child_table))
        {
//      ref: http://laravel.io/forum/02-21-2014-order-and-paginate-a-collection-by-a-releted-field-using-eloquent?page=1
            $query = User::leftJoin($child_table, function($join) use($sort, $child_table) {                
                $join->on('users.id', '=', $child_table.'.user_id')
                    ->where($child_table.'.key', '=', $sort);                
            })->orderBy($child_table.'.value', $direction )->with($child_table);
        }
        else
        {
            $query = User::with('user_metas')->orderBy($sort, $direction);
        }
        
        // exclude super_admin if login user is NOT super admin !!
        if($this->user['role'] != 'super_admin')
        {
            $query = $query->where('role', '<>', 'super_admin');
        }
        
        // USING SEARCH CONDITION !!
		if( !empty($search) )
        {
            $query = $query->where(function($query) use($search){
                $query->where('name', 'LIKE', '%'.$search.'%')                    
                      ->orWhere('email', 'LIKE', '%'.$search.'%')                    
                      ->orWhereRaw('REPLACE(role, "_", " ") LIKE "%'.$search.'%"')                    
                      ->orWhereHas('user_metas', function($query) use($search) {
                            $query->whereNested(function($query) use($search) {
                                $query->where('value', 'LIKE', '%'.$search.'%');
                            });
                        });
            });
		}
        
        // AUTO PAGINATION BY LARAVEL !!
        // ref: http://stackoverflow.com/questions/19616720/laravel-paginate-and-get
        $query = $query->paginate($this->mySetting['custom-pagination'], ['users.*'])->appends(array_filter([
            'sort' => $sort,
            'direction' => $direction,
            'child_table' => $child_table,
            'search' => $search,
        ]));
        
        $pagination = Helper::pagination_links($query);
        
        $query = $query->toArray();
        $query['data'] = array_map(function($value){ return Helper::breakUserMetas($value); }, $query['data'] );
        
        return view('users.index')->with([
            'title' => 'User Accounts | '.$this->mySetting['title'],
            'content' => $query,
            'pagination' => $pagination,
            
            // URL link params !!
            'sort' => $sort,
            'direction' => $direction,
            'child_table' => $child_table,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')->with([
            'title' => 'Add User Account | '.$this->mySetting['title'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all()['data'];
        
        $users = new User;
        
        if( ! $users->fill($data['User'])->isValid() )
        {
            return redirect()->back()->withInput()->withErrors($users->errors);
        }
        
        // if the user input is valid then save it !!
        $users->save();
        
        // save UserMeta !!
        $data['UserMeta'] = array_filter( array_map('trim', $data['UserMeta'] ) );
        if(!empty($data['UserMeta']))
        {
            foreach($data['UserMeta'] as $key => $value)
            {
                UserMeta::create([
                    'user_id' => $users->id,
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }
        
        return redirect()->route('admin.users.index')->with('flash_message', 'New User added to the database successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Helper::breakUserMetas( User::with('user_metas')->find($id) );
        return view('users.edit')->with([
            'title' => 'Edit User Account | '.$this->mySetting['title'],
            'content' => $query,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usersData = $request->except(['user_metas']);       
        $users = User::find($id);
        if( ! $users->fill($usersData)->isValid() )
        {
            return redirect()->back()->withInput()->withErrors($users->errors);
        }
        
        // if the user input is valid then save it !!
        $users->save();
        $users->touch();
        
        // save UserMeta !!
        $userMetasData = array_map('trim', $request->get('user_metas') );
        foreach($userMetasData as $key => $value)
        {
            $user_metas = UserMeta::where('user_id', $id)->where('key', $key);
            if(empty($value))
            {
                $user_metas->delete();
            }
            else
            {
                $user_metas_value = $user_metas->get(['value']);
                if( count($user_metas_value) )
                {
                    if($user_metas_value[0]->value != $value)
                    {
                        $user_metas->update(['value' => $value]);
                    }
                }
                else
                {
                    UserMeta::create([
                        'user_id' => $id,
                        'key' => $key,
                        'value' => $value,
                    ]);
                }
            }
        }
        
        return redirect()->route('admin.users.index')->with('flash_message', 'User Account of <strong>'.$users->name.'</strong> has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->user['id'] == $id)
        {
            return redirect()->route('admin.users.index')->with('error_message', 'Invalid account deletion!<br>Cannot delete your account by yourself.');
        }
        
        $users = User::find($id);
        $users->delete();
        
        return redirect()->route('admin.users.index')->with('flash_message', 'User Account of <strong>'.$users->name.'</strong> has been deleted successfully!');
    }
}
