<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Helper; // "use" must target class (no need target path folder, because has been already initiated in aliases) !!

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['result' => [
            'hana' => 'tania',
            'andy' => 'basuki',
            'clara' => 'tania basuki',
        ]];        
        
        Helper::call_dpr($result);

        return view('welcome')->with($result);
        
        
    }
}
