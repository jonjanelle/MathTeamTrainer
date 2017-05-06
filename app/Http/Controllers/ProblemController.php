<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Auth;
use App\Problem, App\User, App\Comment, App\Like;


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

    //Return home if category does not exist.
    if (count($pData)==0){
      Session::flash("message","Sorry, no problems are available in the requested category.");
      return redirect('/');
    }

    $solved = [];
    //Get list of solved problems if user is not a guest
    if (!Auth::guest()) { $solved = Session::get('solved');}
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
    $data = Problem::where('category','=',$category)
                     ->orderBy($sortCat, $order)
                     ->get();

    Session::remove($category);
    Session::put($category, $data);
  }


  /*
   * View a problem from a given $category with id $pid
   * if $feedback is true, then showing problem after an answer submit.
   */
  public function show($category, $pid, $feedback=false, $correct=false, $userResponse=null){
      if (!Session::has($category)) { //load problem data if needed
        $this->loadProblemData($category);
      }
      //Retrieve problem data from session
      $pData = Session::get($category);

      //Get the comments for this problem if user is logged in
      $comments = Auth::guest()?null:$this->getCommentsByProblem($pid);

      //search for problem by id in data from session
      for ($i=0; $i<$pData->count(); $i++) {
        $p=$pData[$i];
        if ($p->id==$pid){ //Problem found if true
          $prev = 'None'; //Set previous and next problem from current
          $next = 'None';
          if ($i>0) { $prev=$pData[$i-1]->id; }
          if ($i<$pData->count()-1) { $next=$pData[$i+1]->id; }
          //Get list of problems solved by current user
          $solved = [];
          if (!Auth::guest()) { $solved = Session::get('solved');}

          return view('problem')->with(['problem'=>$p,
                                        'category'=>$category,
                                        'next'=>$next,
                                        'prev'=>$prev,
                                        'comments'=>$comments,
                                        'feedback'=>$feedback,
                                        'correct'=>$correct,
                                        'userAns'=>$userResponse,
                                        'solved'=>$solved]);
        }
      }
      //If here, then the problem was not found.
      Session::flash("message", "The requested problem was not found!");
      return redirect("/problems/".$category);
  }

  /*
   * Validate user response
   * $category : problem category
   * $pid : Problem id code
   */
  public function checkResponse(Request $request, $category, $pid) {
    $this -> validate($request, ['answer-input'=>'required']);

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
          if (!Auth::guest()) { //User gets a correct answer and is logged in
            $this->updateUserData($p);
          }
        }
        return $this->show($category, $pid, true, $correct, $userResponse);

      }
    }
    return view('problemlist')->with(['problems'=>$pData,
                                      'category'=>$category]);
  }


  /*
   * Post a new comment to a problem's discussion board
   * Returns to originating problem view after submission
   */
  public function postNewComment(Request $request,$category,$pid)
  {
    $newComment = new Comment();
    $newComment->message = $request->input("comment-input");
    $newComment->problem_id = $pid;
    $newComment->user_id = Auth::user()->id;
    $newComment->save();

    return redirect("/problems/".$category."/problem/".$pid);
  }

  /*
   * Like a comment
  */
  public function likeComment($category,$pid,$cid,$dir){
    /*Check if user has already liked/disliked comment, return if yes*/
    $user=Auth::user();
    $prevLikes = $user->likes;
    for ($i=0; $i<$prevLikes->count(); $i++){
      if ($prevLikes[$i]->comment_id==$cid){
        return redirect("/problems/".$category."/problem/".$pid);
      }
    }

    $newLike = new Like();
    $newLike->user_id = $user->id;
    $newLike->comment_id = $cid;

    $c=Comment::find($cid);
    if ($dir=='up'){
      $c->likes +=1;
      $newLike->rating=1;
    }
    else if ($dir=='down') {
      $c->dislikes+=1;
      $newLike->rating=-1;
    }
    $c->save();
    $newLike->save();
    return $c;
  }

  /*
   * Get list of Comment objects for the given problem id number.
  */
  private function getCommentsByProblem($pid) {
      $p = Problem::find($pid);
      if ($p!=null) {
        return Problem::find($pid)->comments;
      } else {
        return null;
      }
  }


  /*
   * Update user data after problem is solved.
   * a) Updates the solved session var to include new pid
   * b) Update the problem_user database to include user/problem pair
   * c) Update the user's experience points
   * $prob: Problem object solved by current user
  */
  private function updateUserData($prob){
    $data = Session::get('solved'); //list of ids of solved problems
    //make sure user hasn't already solved problem
    if (!in_array($prob->id, $data)){
      array_push($data,$prob->id);
      Session::put('solved',$data); //update the problem id session list
      //Update the Problem object session list (for home view output)
      $pCollection= Session::get('problems_solved');
      $pCollection->push($prob);
      Session::put('problems_solved',$pCollection);

      //Update the problem_user table
      Auth::user()->problems()->save($prob);

      //Update user experience points and problem count
      $user = Auth::user();
      $user->xp += $prob->xp;
      $user->solved+=1;
      $user->save();
    }
  }
}
