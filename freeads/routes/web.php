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



Route::get('/', 'HomeController@index')->name('base')->middleware('verified');
Route::get('/index', 'IndexController@showIndex')->name('index');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/modifUser', 'ModifUserController@index')->name('viewModif')->middleware('verified');
Route::post('/modifUser', 'ModifUserController@edit')->name('editUser')->middleware('verified');


Route::resource('annonces', 'AdsController')->middleware('verified');
