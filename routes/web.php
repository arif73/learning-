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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/loan','LoanController@store')->name('store');
Route::get('/show','LoanController@index');
Route::get('test',function(){
	return 'hello';
});


Route::get('file','LoanController@fileindex');
Route::get('fileinput','LoanController@fileform');
Route::post('/store','LoanController@storefile')->name('storefile');
Route::get('/delete/{id}','LoanController@delete')->name('user.delete');
