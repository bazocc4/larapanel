<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Setting;
use App\Models\User;

use Helper;
use Auth;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $mySetting, $user;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // load all settings ...
        $this->mySetting = Setting::orderBy('id', 'asc')->get()->toArray();
        $this->mySetting = array_column($this->mySetting, 'value', 'key');
        View::share('mySetting', $this->mySetting);
        
        // load current user if logged in ...
        if(Auth::guard('admin')->check())
        {
            $this->user = Auth::user()->toArray();
            View::share('user', $this->user);
        }
    }
}
