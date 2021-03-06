<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/users', 'UserController@store');
Route::post('/login', 'UserController@login');
Route::middleware('auth:api')->get('/me', 'UserController@me');

Route::get('/boards', 'BoardController@index');
Route::post('/boards', 'BoardController@store');
Route::patch('/boards/{board}', 'BoardController@update');
Route::delete('/boards/{board}', 'BoardController@destroy');
