<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class IndexController extends Controller
{
  //Show main login page.
  //To do: check if user already logged in, redirect appropriately if true
  public function index() {
    if (Auth::guest()) {
      return view('auth.login');
    } else {
      return view('home');
    }
    //  return view('login')->with(['title'=>'Login']);
  }

   //Show the new user creation form
   public function newUser(){
     return view('auth.register');
   }

   //Process submission of new user creation form
   public function createUser(Request $request){
         DB::insert('insert into users (username, password, alias) values (?, ?, ?)', ['user2', 'pass1','user1']);
   }

   public function validateLogin(Request $request)
   {
    // $email = $request->input('email-input');
    // $password = $request->input('password-input');

    // return view('problemlist')->with(['email'=>$email,
      //                                'password'=>$password]);
    }
}
