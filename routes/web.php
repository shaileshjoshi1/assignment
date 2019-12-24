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

Route::get('/', function () {
    return view('welcome');
});

/*
Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');
 
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
 
    Route::apiresource('students', 'StudentController');
});
*/

Route::get('students', 'StudentController@index');

Route::post('students', 'StudentController@store');


Route::get('students/{id}', 'StudentController@show');

Route::post('students/{id}', 'StudentController@update');

Route::delete('students/{id}', 'StudentController@destroy');

//Route::apiResource('students','StudentController');
//Route::resource('students', 'StudentController');
/*
Route::get('students', 'StudentController@index');

Route::get('students/{id}', 'StudentController@edit');

Route::get('students/{id}', 'StudentController@edit');

Route::post('students', 'StudentController@store');

Route::put('students/{id}', 'StudentController@update');


Route::delete('students/{id}', 'StudentController@destroy');
*/