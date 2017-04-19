<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Auth;
use App\Problem, App\User, App\Comment;


class ProblemController extends Controller
{
  /*
   * Get problem listing view for selected category
   * $category - the all-lowercase category name (algebra, geometry, etc...)
   * $sortCat - The column by which data should be sorted.
   * $sortOrder - Order (ASC or DESC) in which results are sorted.
   */
  public function index($category, $sortCat='id', $sortOrder="asc") {
    if (!Session::has($category)) {
      $this->loadProblemData($category,$sortCat,$sortOrder);
    }
    $pData = Session::get($category);
    $solved = [];
    //Get list of solved problems if user is not a guest
    if (!Auth::guest()) { $solved = Session::get('solved'); }
    return view('problemlist')->with(['problems'=>$pData,
                                      'category'=>$category,
                                      'sortCat'=>$sortCat,
                                      'sortOrder'=>$sortOrder,
                                      'solved'=>$solved]);
  }

  /*
   * Reload the problem data for a specified category
   * sorted by $sortCat in $sortOrder (ASC or DESC)
   */
  public function sortIndex($category, $sortCat, $sortOrder)
  {
    $this->loadProblemData($category,$sortCat,$sortOrder);
    return $this->index($category, $sortCat, $sortOrder);
  }

  /*
   * Store the problem set for a requested category to the current session
   * $category - the all-lowercase category name (algebra, geometry, etc...)
   * $sortCat - The column by which data should be sorted.
   * $order - Order (ASC or DESC) in which results are sorted.
   */
  private static function loadProblemData($category, $sortCat="id",$order="asc"){
    //$data=DB::table('problems')->where('category', $category)->orderBy($sortCat, $order)->get();
    $data = Problem::where('category','=',$category)
                  -> orderBy($sortCat, $order)
                  -> get();

    Session::remove($category);
    Session::put($category, $data);
  }

  //Get list of Comment objects for the given problem id number.
  private function getCommentsByProblem($pid) {
      return Problem::find($pid)->comments;
  }

  /*
   * View a problem from a given $category with id $pid
   */
  public function show($category, $pid){
      if (!Session::has($category)) { //load problem data if needed
        $this->loadProblemData($category);
      }

      //Get the comment board for this problem if user is logged in
      $comments = Auth::guest()?null:$this->getCommentsByProblem($pid);

      //Retrieve data from session (rather than querying db again.)
      $pData = Session::get($category);
      foreach ($pData as $p) { //linear search for id (ids not necessarily ordered)
        if ($p->id==$pid){
          return view('problem')->with(['problem'=>$p,
                                        'category'=>$category,
                                        'feedback'=>false,
                                        'next'=>'None',
                                        'prev'=>'None',
                                        'comments'=>$comments]);
        }
      }

      //If requested problem not found, then go to listing page for category.
      //TO DO: return error message indicating requested problem not found.
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
    $comments = Auth::guest()?null:$this->getCommentsByProblem($pid);
    foreach ($pData as $p) {
      if ($p->id==$pid){
        if ($p->answer==floatval($userResponse)){
          $correct=true;
          if (!Auth::guest()) {
            $this->updateUserData($pid);
          }
        }
        return view('problem')->with(['problem'=> $p,
                                      'feedback'=>true,
                                      'correct'=>$correct,
                                      'userAns'=>$userResponse,
                                      'next'=>'None',
                                      'prev'=>'None',
                                      'comments'=>$comments]);
      }
    }
    return view('problemlist')->with(['problems'=>$pData,
                                      'category'=>$category]);
  }


  /*
   * Post a new comment to a problem's discussion board
   *
  */
  public function postNewComment(Request $request, $category,$pid)
  {
    $newComment = new Comment();
    $newComment->message = $request->input("comment-input");
    $newComment->problem_id = $pid;
    $newComment->user_id = Auth::user()->id;
    $newComment->save();
    return $this->show($category, $pid);
  }

  /*
   * Add id of new problem solved to user json data
   * Should be using a pivot table here.
  */
  private function updateUserData($pid){
    $data = Session::get('solved');
    //make sure user hasn't already solved problem
    if (!in_array($pid,$data)){
      array_push($data,$pid);
      Session::put('solved',$data);
      //Update user experience points
      $user = Auth::user();
      $user->xp += 100;
      $user->save();
      $data = json_encode($data);
      file_put_contents('json/'.$user->id.'.json', $data);
    }
  }


}
