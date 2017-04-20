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

//root route -> to dashboard or login page
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/deletecomment/{cid}','HomeController@deleteComment');

Auth::routes();

//Main leaderboard route
Route::get('/leaderboard','LeaderboardController@index');

//Routes for viewing an individual problem
//These must be positioned before listing route!
Route::get('/problems/{category}/problem/{pid}','ProblemController@show'); //pid = problem id
Route::post('/problems/{category}/problem/{pid}/check','ProblemController@checkResponse');
Route::post('/problems/{category}/problem/{pid}/comment','ProblemController@postNewComment');
Route::get('/problems/{category}/problem/{pid}/check','ProblemController@checkResponse');
//Route for viewing problem listing
Route::get('/problems/{category}','ProblemController@index');
//Route for viewing sorted listing
Route::get('/problems/sort/{category}/{sortCat}/{sortOrder}','ProblemController@sortIndex');
