<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;

class AdminController extends Controller
{
    public function index() {
      return view('admin.addproblem');
    }

    public function addProblem(Request $request) {
      $newProb = new Problem();
      $newProb->name = $request->input('name');
      $newProb->category = $request->input('category');
      //need to store this locally, then set path to local storage.
      $imgFile = $request->input('file');
      $newProblem->difficulty = $request->input('difficulty');
      $newProblem->xp = $request->input('xp');
    }
}
