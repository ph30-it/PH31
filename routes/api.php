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
//list user
Route::get('/users', 'API\UserController@index');
// store user
Route::post('/users', 'API\UserController@store');
//update user
Route::put('/users/{id}', 'API\UserController@update');
// get breed of cat
Route::get('cats/{id}/breeds', 'API\CatController@getBreed');
//grant access google API
Route::get('access', 'API\SocialController@grantAccess');
//callback google API
Route::get('/oauth2callback', 'API\SocialController@callback');
