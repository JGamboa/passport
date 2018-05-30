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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::post('details', 'UserController@details');
Route::group(['middleware' => 'auth:api'], function(){
    
    Route::resource('lugares', 'LugaresAPIController');

});

//Route::get('lugares', 'API\LugaresAPIController@index')->middleware('auth:api');


