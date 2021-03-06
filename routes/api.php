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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/language','App\Http\Controllers\LanguagesController@getLanguages');
Route::get('/getcommand/{device}','App\Http\Controllers\CommandsController@getCommand');
Route::get('/getallcommands/{username}','App\Http\Controllers\CommandsController@getAllCommandsByUser');
Route::get('/getusercommand/{device}','App\Http\Controllers\CommandsController@deviceCommand');
Route::get('check/useraccount','App\Http\Controllers\UsersController@checkUsernamePassword');
Route::post('/postcommand','App\Http\Controllers\CommandsController@postCommand');
Route::post('/postnewuser','App\Http\Controllers\UsersController@postNewUsernamePassword');
Route::post('/updatecommand','App\Http\Controllers\CommandsController@updateCommandByIdAndDevice');
