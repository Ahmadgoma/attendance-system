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

// disable register route
Route::match(['get', 'post'], 'attendance-dashboard/register', function () {
    return redirect('/attendance-dashboard/login');
});

Route::group(['prefix' => 'attendance-dashboard'], function () {
    Auth::routes();
});

// Dashboard
Route::group(['middleware' => 'auth', 'namespace' => 'Backend'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::resource('employees', 'EmployeeController')->except([
        'edit', 'update', 'destroy','show'
    ]);

    Route::get('employees/attendance/{id}', 'AttendanceController@show')->name('employees.attendance');

});