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


route::view('/','welcome');

Route::get('mamafua','mamafua\mamafuacontroller@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
