<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Session, App\User, App\Comment, App\Like;

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
      $comments = $user->comments;
      $solved = $this->getUserSolved($user);
      return view('home')->with(["user"=>$user,
                                 "solved"=>$solved,
                                 "comments"=>$comments,
                                 "bestCat"=>$this->findBestCategory($solved)]);
    }

    /*
     * $col is a Collection of Problems
     * laravel.com/docs/5.4/collections
     * Finds most common category in O(n)
     * Returns String category name or null if no problems solved.
     */
    private function findBestCategory($col) {
      $cats = [];
      $maxNum=0;
      $maxCat=null;
      for ($i=0; $i<count($col); $i++){
        $current = $col[$i]->category;
        if (array_key_exists($current,$cats)){
          $cats[$current]+=1;
        } else {
          $cats[$current]=1;
        }
        //Set new max category if needed.
        if ($cats[$current]>$maxNum){ $maxCat=$current; }
      }
      return $maxCat;
    }
    /*
     * Get an array of all of the problems solved by user.
     * User-problem pairs stored in problem_user pivot table
     * Attempts to use data stored in session if possible rather than a db query
     */
    public function getUserSolved($user) {
        if (Session::get('solved')==null){
          $data = $user->problems;
          $d = array();
          for ($i=0; $i<count($data);$i++){
            array_push($d, $data[$i]->id);
          }
          Session::put("solved",$d); //just the problem id numbers
          Session::put("problems_solved",$data); //Problem objects
          return $data;
        }

        return Session::get('problems_solved');
    }


    /*
    * Delete a comment
    */
    public function deleteComment($cid)
    {
      //get Comment object
      $c = Comment::find($cid);
      //only creator should be able to delete
      if ($c!=null && $c->user->id==Auth::user()->id) {
        //need to destroy and likes associated with comment first.
        $c-> likes()->delete();
        //Then destroy the comment itself.
        $c->delete();
      }
      //return $this->index(); //back home
    }
}
