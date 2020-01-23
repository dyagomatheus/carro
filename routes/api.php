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
Route::group(['namespace' => 'Api', 'middleware' => ['api', 'auth:api']], function () {
    Route::get('history', 'HistoryController@index');
    Route::get('clients', 'ClientController@index');
    Route::get('mycar', 'CarController@index');
    Route::get('me', 'Auth\AuthApiController@getAuthenticatedUser');
});

Route::post('auth', 'Auth\AuthApiController@authenticate');
Route::post('auth-refresh', 'Auth\AuthApiController@refreshToken');

Route::get('balances', 'Api\BalanceController@index');

Route::get('transactions', 'Api\TransactionController@index');