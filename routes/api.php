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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group([

//     'prefix' => 'auth'

// ], function () {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
    
// });

// Route::get('getInfo', 'UserController@getInfo');

// Route::group(['prefix' => 'department'], function(){

//     route::get('all', 'DepartmentController@allDepartments');
//     route::post('add', 'DepartmentController@addDepartment');
//     route::delete('delete/{departmentId}', 'DepartmentController@deleteDepartment');
//     route::put('update', 'DepartmentController@updateDepartment');
//     route::get('details/{departmentId}', 'DepartmentController@detailsDepartment');
// });

// Route::group(['prefix' => 'employee'], function(){
//     route::post('add', 'EmployeeController@addEmployee');
//     route::get('all', 'EmployeeController@allEmployee');
//     route::get('details/{employeeId}', 'EmployeeController@detailsEmployee');
//     route::get('search/{query}/{search}', 'EmployeeController@searchEmployee');
//     route::put('update/{employeeId}', 'EmployeeController@updateEmployee');
//     route::get('search/for/promotion/{searchField}', 'EmployeeController@EmployeeSearchForPromotion');
//     route::put('/promotion/{employeeId}', 'EmployeeController@EmployeePromotion');
// });
// Route::group(['prefix' => 'expanse'], function(){
//     route::post('add', 'ExpanseController@addExpanse');
//     route::get('today', 'ExpanseController@todayAllExpanse');
//     route::get('yesterday', 'ExpanseController@yesterdayAllExpanse');
//     route::get('current/month', 'ExpanseController@currentMonthAllExpanse');
//     route::get('current/month/search/{query}/{searchField}', 'ExpanseController@currentMonthExpanseSearch');
// });

// Route::group(['prefix' => 'salary'],function(){
//     route::get('unpaid/employee/current/month/{departmentId}', 'SalaryController@getAllUnpaidEmployeeOfCurrentMonth');
//     route::post('pay/{employeeId}', 'SalaryController@payCurrentMonthSalary');
//     route::get('current/month/all/salary/list', 'SalaryController@CurrentMonthSalarySheet');
//     route::get('previous/all/month/for/salary/sheet', 'SalaryController@previousAllMonthsForSalarySheet');
//     route::get('particular/month/all/salary/sheet/{month}', 'SalaryController@particularMonthSalaryList');
//     route::get('particular/month/particular/employee/salary/sheet/search/{month}/{searchField}', 'SalaryController@particularMonthEmployeeSearchSalarySheet');
// });
// route::get('test/{depId}', 'SalaryController@test');