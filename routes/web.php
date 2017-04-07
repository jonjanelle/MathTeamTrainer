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

//Login and account creation routes
Route::get('/', 'IndexController@index');
//Route::post('/login', 'IndexController@validateLogin');
Route::get('/newuser','IndexController@newUser');

//Routes for viewing individual problem
//These must be positioned before listing route!
Route::get('/problems/{category}/problem/{pid}','ProblemController@show'); //pid = problem id
Route::post('/problems/{category}/problem/{pid}/check','ProblemController@checkResponse');

//Routes for viewing problem listing
Route::get('/problems/{category}/{sortCat?}/{sortOrder?}','ProblemController@index');





//Temp route for moving json data to problem database
//Route::get("/datamove","DataUpdate@move");

Auth::routes();

Route::get('/home', 'HomeController@index');
