<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class ProblemController extends Controller
{
  /*
   * Get problem listing view for selected category
   */
  public function index($category, $sortCat='xp', $sortOrder="ASC") {
    $this->loadProblemData($category,$sortCat,$sortOrder);
    $pData = Session::get($category);
    return view('problemlist')->with(['problems'=>$pData,
                                      'category'=>$category,
                                      'sortCat'=>$sortCat,
                                      'sortOrder'=>$sortOrder]);
  }

  /*
   * Store the problem set for a specified category to
   * the current session
   * $category - the all-lowercase category name (algebra, geometry, etc...)
   */
  private static function loadProblemData($category, $sortCat="xp",$order="ASC"){
    $data=DB::table('problems')->where('category', $category)->orderBy($sortCat, $order)->get();
    Session::remove($category);
    Session::put($category, $data);
  }




  /*
   * View a problem from a given $category with
   * id $pid
   */
  public function show($category, $pid){
      if (!Session::has($category)) { //load problem data if needed
        $this->loadProblemData($category);
      }

      $pData = Session::get($category);

      foreach ($pData as $p) {
        if ($p->id==$pid){
          return view('problem')->with(['problem'=>$p,
                                        'category'=>$category,
                                        'feedback'=>false,
                                        'next'=>'None',
                                        'prev'=>'None']);
        }
      }

      //If requested problem not found, then go to listing page
      //for category. To do: send back an error message indicating
      //problem not found.
      return view('problemlist')->with(['problems'=>$pData,
                                        'category'=>$category]);
  }

  /*
   * Validate user response
   * $category : problem category
   * $pid : Problem id code
   */
  public function checkResponse(Request $request, $category, $pid) {
    if (!Session::has($category)) { //load problem data if needed
      $this->loadProblemData($category);
    }

    $pData = Session::get($category);
    $correct = false;
    $userResponse = $request->input("answer-input");

    foreach ($pData as $p) {
      if ($p->id==$pid){
        if ($p->answer==floatval($userResponse)){
          $correct=true;
        }
        return view('problem')->with(['problem'=> $p,
                                      'feedback'=>true,
                                      'correct'=>$correct,
                                      'userAns'=>$userResponse,
                                      'next'=>'None',
                                      'prev'=>'None']);
      }
    }
    return view('problemlist')->with(['problems'=>$pData,
                                      'category'=>$category]);
  }
}
