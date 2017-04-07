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
      $this->getUserData($user->id);
      return view('home')->with(["user"=>$user]);
    }

    public function getUserData($id){
      if (file_exists('json/'.$id.'.json')){
        $file = file_get_contents('json/'.$id.'.json');
        $data = json_decode($file, true);
        Session::put("userData",$data);
        return $data;
      }
      else {
        $newData = json_encode(['solved'=>[]]);
        file_put_contents('json/'.$id.'.json', $newData);
        Session::put("userData",$newData);
        return array();
      }
    }




}
