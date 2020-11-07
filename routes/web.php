<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('employees.index'));
});

Route::group(['prefix' =>'employees', 'as' => 'employees.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => '\App\Http\Controllers\EmployeeController@index']);
    Route::get('/edit/{employeeId}/', ['as' => 'edit', 'uses' => '\App\Http\Controllers\EmployeeController@editEmployeeEntry']);
    Route::put('/update/{employeeId}/', ['as' => 'update', 'uses' => '\App\Http\Controllers\EmployeeController@updateEmployeeEntry']);
    Route::get('/delete/{employeeId}/', ['as' => 'delete', 'uses' => '\App\Http\Controllers\EmployeeController@deleteEmployeeEntry']);
});
