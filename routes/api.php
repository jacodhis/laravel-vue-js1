<?php

use Illuminate\Http\Request;
use App\Http\controllers\contactscontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/contacts/create', [contactscontroller::class,'create']);
Route::get('/contacts/{id}', [contactscontroller::class,'show']);
Route::get('/contacts/edit/{id}', [contactscontroller::class,'edit']);
Route::POST('/contacts/store',[contactscontroller::class,'store']);
Route::get('/contacts',[contactscontroller::class,'index']);
Route::delete('/delete', [contactscontroller::class,'destroy']);
Route::match(['put','patch'],'contacts/update/{id}',[contactscontroller::class,'update']);


