<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataUpdate extends Controller
{
  public function move() {
    $pString = file_get_contents("json/geometryDat.json");
    $data = json_decode($pString, true);
    foreach ($data['problems'] as $p) {

      DB::insert('insert into problems (category,subcategory,name,difficulty,image,answer,xp)
                  values (?,?,?,?,?,?,?)', [$data['name'], '',$p['name'],$p['difficulty'],$p['img'],$p['answer'],$p['xp']]);
    }
    return view('login')->with(['title'=>'Login']);
  }

}
