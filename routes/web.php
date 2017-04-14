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

//root route
Route::get('/', 'HomeController@index');
//Route::get('/', 'DataUpdate@move');

//Routes for viewing individual problem
//These must be positioned before listing route!
Route::get('/problems/{category}/problem/{pid}','ProblemController@show'); //pid = problem id
Route::post('/problems/{category}/problem/{pid}/check','ProblemController@checkResponse');

//Route for viewing problem listing
Route::get('/problems/{category}','ProblemController@index');

//Route for viewing sorted listing
Route::get('/problems/sort/{category}/{sortCat}/{sortOrder}','ProblemController@sortIndex');


//Temp route for moving json data to problem database
//Route::get("/datamove","DataUpdate@move");

Auth::routes();

Route::get('/home', 'HomeController@index');
