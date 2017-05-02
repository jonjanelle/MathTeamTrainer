<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
//root route -> to dashboard or login page
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/deletecomment/{cid}','HomeController@deleteComment');
Route::get('/newproblem','AdminController@index');
Route::post('/newproblem/submit','AdminController@addProblem');

/*view main problem listing for a given category*/
Route::get('/problems/{category}','ProblemController@index');

/*view leaderboard*/
Route::get('/leaderboard','LeaderboardController@index');

//individual problem routes must be positioned before main sort route
/*Show individual problem by id*/
Route::get('/problems/{category}/problem/{pid}','ProblemController@show'); //pid = problem id

/*Process user answer form */
Route::get('/problems/{category}/problem/{pid}/check','ProblemController@checkResponse');
Route::post('/problems/{category}/problem/{pid}/check','ProblemController@checkResponse');

/*Comment board related*/
Route::post('/problems/{category}/problem/{pid}/comment','ProblemController@postNewComment');
Route::get('/problems/{category}/problem/{pid}/vote/{cid}/{dir}','ProblemController@likeComment'); //cid = comment id

/* Sort problems in a main listing category*/
Route::get('/problems/sort/{category}/{sortCat}/{sortOrder}','ProblemController@sortIndex');
