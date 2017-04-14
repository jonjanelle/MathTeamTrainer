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
     * Show the application dashboard for
     * an authenticated user. Dashboard shows
     * the username, experience points, and a list
     * of solved problems
     * @return \Illuminate\Http\Response
     */
    public function index(){
      if (Auth::guest()) { return view('auth.login'); }
      $user = Auth::user();
      $solved = $this->getUserSolved($user->id);
      return view('home')->with(["user"=>$user,
                                 "solved"=>$solved]);
    }

    /*
     * Get an array of all of the problems solved by user.
     * Solved problems are stored in a json data file.
     * If no data exists for the user, then a new file is created. 
     *
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
