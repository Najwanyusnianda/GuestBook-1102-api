<?php

use Illuminate\Http\Request;

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

Route::get('guests','GuestController@getAllGuest');
Route::get('guest/{email}','GuestController@getGuest');
Route::post('post-guest','GuestController@postNewGuest');
Route::put('guest/update/{id}', 'GuestController@updateGuest');
