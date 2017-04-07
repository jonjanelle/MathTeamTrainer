<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
  //Show main login page.
  //To do: check if user already logged in, redirect appropriately if true
  public function index() {
      return view('auth.login');
    //  return view('login')->with(['title'=>'Login']);
  }

   //Show the new user creation form
   public function newUser(){
     return view('newuser')->with(['title'=>'Create User']);
   }

   //Process submission of new user creation form
   public function createUser(Request $request){
         DB::insert('insert into users (username, password, alias) values (?, ?, ?)', ['user2', 'pass1','user1']);
   }

   public function validateLogin(Request $request)
   {
     $email = $request->input('email-input');
     $password = $request->input('password-input');

     return view('problemlist')->with(['email'=>$email,
                                      'password'=>$password]);
    }
}
