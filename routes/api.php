<?php

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

Route::namespace('Api\Auth')->group(function () {
    Route::post('login', 'LoginController@login');
});

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Api'], function () {
    Route::get('check-in-out','EmployeeController@attendEmployee');
});