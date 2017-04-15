<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


/*
* Made this before I knew about seeders to fill db with sample problems.
*/
class DataUpdate extends Controller
{
  public function move() {
    $pString = file_get_contents("json/algebraDat.json");
    $data = json_decode($pString, true);
    foreach ($data['problems'] as $p) {
      DB::insert('insert into problems (name,category,subcategory,difficulty,image,answer,xp)
                  values (?,?,?,?,?,?,?)', [$p['name'],$data['name'],'',$p['difficulty'],$p['img'],$p['answer'],$p['xp']]);
    }
    return view('login')->with(['title'=>'Login']);
  }

}
