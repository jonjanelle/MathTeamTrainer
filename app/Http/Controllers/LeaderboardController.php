<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, App\User;

class LeaderboardController extends Controller
{
  public function index()
  {
    $result = User::orderBy('xp','desc')->limit(25)->get();
    return view('leaderboard')->with(['users'=>$result]);
  }
}
