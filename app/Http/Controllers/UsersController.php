<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Helper;

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
        $sort = "created_at";
		$direction = "DESC";
        
        $query = User::with('user_metas')
            ->orderBy($sort, $direction)
            ->paginate($this->mySetting['custom-pagination'])
            ->toArray();
        
        $query['data'] = array_map(function($value){ return Helper::breakUserMetas($value); }, $query['data'] );
        
        return view('users.index')->with([
            'title' => 'User Accounts | '.$this->mySetting['title'],
            'content' => $query,
            'sort' => $sort,
            'direction' => $direction,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
