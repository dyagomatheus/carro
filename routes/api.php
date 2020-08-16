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

Route::group(['middleware' => ['api', 'auth:api']], function () {
    Route::get('history', 'Api\HistoryController@index');
    Route::get('clients', 'Api\ClientController@index');
    Route::get('mycar', 'Api\CarController@index');
    Route::get('schedules', 'Api\ScheduleController@index');
    Route::put('user/{id}/update', 'Api\UserController@update');
    Route::get('notifications', 'Api\HistoryController@notifications');
    Route::get('me', 'Auth\AuthApiController@getAuthenticatedUser');
});

Route::post('auth', 'Auth\AuthApiController@authenticate');
Route::post('auth-refresh', 'Auth\AuthApiController@refreshToken');

Route::get('balances', 'Api\BalanceController@index');

Route::get('transactions', 'Api\TransactionController@index');