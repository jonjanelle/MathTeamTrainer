<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ProblemController extends Controller
{
  /*
   * Get problem listing view for selected category
   */
  public function index($category) {
    if (!Session::has($category)) {
      $this->loadProblemData($category);
    }

    $pData = Session::get($category);
    return view('problemlist')->with(['problems'=>$pData,
                                      'category'=>$category]);
  }

  /*
   * Store the problem set for a specified category to
   * the current session
   */
  private static function loadProblemData($category){
    $pString = file_get_contents("json/".$category."Dat.json");
    Session::put($category,json_decode($pString, true));
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

      foreach ($pData['problems'] as $p) {
        if ($p['id']==$pid){
          return view('problem')->with(['problem'=>$p,
                                        'category'=>ucfirst($category)]);
        }
      }

      //If requested problem not found, then go to listing page
      //for category. To do: send back an error message indicating
      //problem not found.
      return view('problemlist')->with(['problems'=>$pData,
                                        'category'=>$category]);
  }

}
