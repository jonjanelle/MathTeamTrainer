<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      if (Auth::guest()) {
        return view('auth.login');
      }
      $user = Auth::user();
      $solved = $this->getUserSolved($user->id);
      return view('home')->with(["user"=>$user,
                                 "solved"=>$solved]);
    }

    /*
     * List of problems solved is stored in a json file 
     */
    public function getUserSolved($id){
      if (file_exists('json/'.$id.'.json')){
        $file = file_get_contents('json/'.$id.'.json');
        $data = json_decode($file, true);
        Session::put("solved",$data);
        return $data;
      }
      else {
        $newData = json_encode(array());
        file_put_contents('json/'.$id.'.json', $newData);
        Session::put("solved",array());
        return array();
      }
    }




}
