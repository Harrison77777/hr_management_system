<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Employee;
use App\Expanse;
use App\Department;
use App\Project;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function entryPoint()
    {
        return view('entry-point.index');
    }

    public function CountDataForDashBoard(){
        date_default_timezone_set('Asia/Dhaka');
        $countRunningProject = Project::where('completion_status', 0)->count();
        $countEmployee = Employee::count();
        $Expanses = Expanse::where('date', date('d-m-Y'))->get();
        $countTodayExpanses = 0;
        foreach ($Expanses as $ex) {
            $countTodayExpanses += $ex->amount;
        }
        $countTodayExpanses;
        $countDepartment = Department::count();

        
        return response()->json(['totalRunningProject' => $countRunningProject, 'totalEmployees' => $countEmployee, 'todayTotalExpanse' => $countTodayExpanses, 'totalDepartment' => $countDepartment], 200);
        
    }


    public function storageLink()
    {
    return Artisan::call('storage:link');
    }
    public function configClear()
    {
        return Artisan::call('config:clear');
    }
    public function configCache()
    {
        return Artisan::call('config:cache');
    }
    public function routeClear()
    {
        return Artisan::call('route:clear');
    }
    public function routeCache()
    {
        return Artisan::call('route:cache');
    }
}
