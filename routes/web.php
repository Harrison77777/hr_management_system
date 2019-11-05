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

Route::get('/', 'HomeController@entryPoint');


// use App\Employee;
// use App\Department;

// Route::get('test', function(){
    //return 'G-'.substr(md5(time()),5,7);
    //return Employee::where('last_salary_pay_month','August')->get();

    // date_default_timezone_set('Asia/Dhaka');

    // dd(date('d-m-Y', strtotime('-1 days')));

    // function sayName($name, $callback){
    //     echo callback($name);
    // }
    
    // $name = 'Harrison';
    // sayName($name, function($name){
    //     return $name;
    // });
    // $double = function($a) {
    //     return $a * 2;
    // };
    
//   return   $employees = Employee::all()->filter(function($employee){
//         return $employee->last_salary_pay_month !== date('F');
//     });  
//    return $dep = Employee::where('department_id', 1)->get()->filter(function($dep){
//        return $dep->last_salary_pay_month == date('F');
//    });
    
// });

// use App\User;

// Route::get('register-user', function(){

//     $addUser = new User();
//     $addUser->name = 'Harrison';
//     $addUser->email = 'harri@gmail.com';
//     $addUser->password = bcrypt('12345');
//     $addUser->save();

// });


Route::group(['prefix' => 'api', 'middleware'=>'auth:web'], function() {

    Route::get('getInfo', 'UserController@getInfo');

    Route::group(['prefix' => 'department'], function(){

        route::get('all', 'DepartmentController@allDepartments');
        route::post('add', 'DepartmentController@addDepartment');
        route::delete('delete/{departmentId}', 'DepartmentController@deleteDepartment');
        route::put('update', 'DepartmentController@updateDepartment');
        route::get('details/{departmentId}', 'DepartmentController@detailsDepartment');
    });

    Route::group(['prefix' => 'employee'], function(){
        route::post('add', 'EmployeeController@addEmployee');
        route::get('all', 'EmployeeController@allEmployee');
        route::get('details/{employeeId}', 'EmployeeController@detailsEmployee');
        route::get('search/{query}/{search}', 'EmployeeController@searchEmployee');
        route::put('update/{employeeId}', 'EmployeeController@updateEmployee');
        route::get('search/for/promotion/{searchField}', 'EmployeeController@EmployeeSearchForPromotion');
        route::put('promotion/{employeeId}', 'EmployeeController@EmployeePromotion');
        route::get('salary/sheets/{employeeId}', 'EmployeeController@EmployeeSalarySheets');
    });
    Route::group(['prefix' => 'expanse'], function(){
        route::post('add', 'ExpanseController@addExpanse');
        route::get('today', 'ExpanseController@todayAllExpanse');
        route::get('yesterday', 'ExpanseController@yesterdayAllExpanse');
        route::get('current/month', 'ExpanseController@currentMonthAllExpanse');
        route::get('current/month/search/{query}/{searchField}', 'ExpanseController@currentMonthExpanseSearch');
        route::get('today/amount/count', 'ExpanseController@todayAmountCount');
        route::get('yesterday/amount/count', 'ExpanseController@yesterdayAmountCount');
        route::get('current/month/amount/count', 'ExpanseController@currentMonthAmountCount');
    });

    Route::group(['prefix' => 'salary'],function(){
        route::get('unpaid/employee/current/month/{departmentId}', 'SalaryController@getAllUnpaidEmployeeOfCurrentMonth');
        route::post('pay/{employeeId}', 'SalaryController@payCurrentMonthSalary');
        route::get('current/month/all/salary/list', 'SalaryController@CurrentMonthSalarySheet');
        route::get('previous/all/month/for/salary/sheet', 'SalaryController@previousAllMonthsForSalarySheet');
        route::get('particular/month/all/salary/sheet/{month}', 'SalaryController@particularMonthSalaryList');
        route::get('particular/month/particular/employee/salary/sheet/search/{month}/{searchField}', 'SalaryController@particularMonthEmployeeSearchSalarySheet');
    });

    
    Route::group(['prefix' => 'recruitment'], function() {
        route::get('all/vacancy', 'RecruitmentController@allVacancies');
        route::post('add/vacancy', 'RecruitmentController@addVacancy');
        route::get('vacancy/edit/info/{vacancyId}', 'RecruitmentController@getVacancyInfoEdit');
        route::put('vacancy/update/{vacancyId}', 'RecruitmentController@updateVacancy');
        route::get('vacancy/details/{vacancyId}', 'RecruitmentController@detailsVacancy');
        route::delete('vacancy/delete/{vacancyId}', 'RecruitmentController@deleteVacancy');
        route::get('all/place', 'QualificationController@allPlace');
        route::post('add/place', 'QualificationController@addPlace');
        route::get('edit/place/info/{placeId}', 'QualificationController@editPlaceInfo');
        route::put('update/place/info/{placeId}', 'QualificationController@updatePlaceInfo');
        route::get('place/details/{placeId}', 'QualificationController@detailsPlaceInfo');
    });

    Route::group(['prefix' => 'project'], function() {
       
        route::post('add', 'ProjectController@addProject');
        route::get('all', 'ProjectController@allProject');
        route::get('details/task/{projectId}', 'ProjectController@projectDetailsAndTasks');
       route::post('add/task/{projectId}', 'ProjectController@addTask');
       route::put('change/is_completed/{taskId}', 'ProjectController@changeIsCompleted');
       route::put('change/competition/status/{projectId}', 'ProjectController@changeCompetitionStatus');
       route::delete('completed/{projectId}', 'ProjectController@completed');
       route::get('edit/info/{projectId}', 'ProjectController@getEditProjectInfo');
       route::put('update/{projectId}', 'ProjectController@updateProject');
    });

    Route::group(['prefix' => 'user'], function(){
        route::get('info', 'UserController@getInfo');
        route::post('update/profile/photo/{userId}', 'UserController@updateUserPhoto');
        route::put('change/password/{userId}', 'UserController@changeUserPassword');
        route::post('add', 'UserController@addUser');
        route::put('update/name/{userId}', 'UserController@updateUserName');
    });
    Route::group(['prefix' => 'report'], function(){
        route::post('add', 'ReportController@addReport');
        route::get('all', 'ReportController@allReport');
        route::delete('delete/{reportId}', 'ReportController@deleteReport');
        route::get('details/{reportId}', 'ReportController@detailsReport');
     
    });
    Route::group(['prefix' => 'dashboard'], function(){
        route::get('counts', 'HomeController@CountDataForDashBoard');
    });
    

});

Auth::routes();

Route::get('storage-link', 'HomeController@storageLink');
Route::get('config-clear', 'HomeController@configClear');
Route::get('config-cache', 'HomeController@configCache');
Route::get('route-clear', 'HomeController@routeClear');
Route::get('route-cache', 'HomeController@routeCache');


