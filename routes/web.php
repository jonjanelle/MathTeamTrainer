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
Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@validateLogin');
Route::get('/newuser','LoginController@newUser');

//Problem listing and viewing routes
Route::get('/problems/{category}','ProblemController@index'); 
Route::get('/problems/{category}/{pid}','ProblemController@show'); //pid = problem id
