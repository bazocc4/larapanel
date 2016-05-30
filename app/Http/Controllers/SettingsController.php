<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;
use DB;
use Route;

use App\Models\Setting;

class SettingsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ===================
        // TEST AREA here ...
        // ===================
        
        // ===================
        // END OF TEST AREA !!
        // ===================
        return view('settings.index')->with([
            'title' => 'Settings | '.$this->mySetting['title'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = $request->all();
        
        // SPECIAL CASE FOR CHECKBOX INPUT DATA...
        array_map(function($value)use(&$data){
            if(empty($data[$value]))   $data[$value] = 0;
        }, ['display_crop', 'thumb_crop', 'overwrite_image']);
        
        // UPDATE LANGUAGE SETTING FIRST !!
        $data['language'] = implode(chr(10), array_merge( [$data['default_language']], isset($data['language'])?$data['language']:[] ) );
        
        // NOW SAVE THE SETTING ...
        array_walk($data, function($value, $key){
            Setting::where('key', $key )->where('value', '<>', $value)->update(['value' => $value]);
        });
        
        $flash = [
            'status' => 'success',
            'message' => 'Settings has been updated.',
        ];
        return redirect()->route('admin.settings.index')->with($flash['status'], $flash['message']);
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
    
    public function add(Request $request)
    {
        if ($request->ajax())
        {
            $nameKey = str_slug($request->key, "_");
            
            $settings = new Setting;
            $settings->key = 'custom-'.$nameKey;
            $settings->value = '';
            $settings->save();
            
            // prepare data for js callback...
            $response = [
                'name' => $settings->key,
                'slug_key' => Helper::string_unslug($nameKey),
            ];
            echo json_encode($response);
        }
        else
        {
            abort(404);
        }
    }
    
    public function delete(Request $request)
    {
        if ($request->ajax())
        {
            Setting::where('key', $request->key)->delete();
        }
        else
        {
            abort(404);
        }
    }
}
