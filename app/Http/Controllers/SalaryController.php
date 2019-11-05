<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Salary\SalaryCollection;
use App\Http\Resources\Employee\EmployeeResource;
use App\Employee;
use App\Salary;
use App\Department;
class SalaryController extends Controller
{
    public function payCurrentMonthSalary(Request $request, $employeeId)
    {
        $this->validate($request, [
            'amount' => 'required|numeric'
        ]);

        date_default_timezone_set('Asia/Dhaka');

        $changeSalaryInfoFromEmpTable = Employee::find($employeeId);
        $checkCurrentMonthSalary = Salary::where('employee_id' , $employeeId)
        ->where('month', date('F'))
        ->where('year', date('Y'))->first();
        if (!$checkCurrentMonthSalary) {
            $changeSalaryInfoFromEmpTable->got_current_month_salary = date('F');
            $changeSalaryInfoFromEmpTable->last_salary_pay_month = date('F');
            $changeSalaryInfoFromEmpTable->last_salary_pay_date = date('d-m-Y');
            $changeSalaryInfoFromEmpTable->save();
        }else {
            
            return response()->json(['error'=> 'Current month salary already paid'], 406);
            
        }

        $addSalarySheet = new Salary();
        $addSalarySheet->salary_amount = $request->amount;
        $addSalarySheet->employee_id = $employeeId;
        $addSalarySheet->month = date('F');
        $addSalarySheet->year = date('Y');
        $addSalarySheet->date = date('d-m-Y');
        $addSalarySheet->emp_id_for_search = $changeSalaryInfoFromEmpTable->employee_id;
        $addSalarySheet->save();
        
        return response()->json(['success' => 'Successfully salary paid'], 201);
        

    }

    public function CurrentMonthSalarySheet()
    {
        date_default_timezone_set('Asia/Dhaka');

        $CurrentMonthSalarySheet = Salary::with('employee')
        ->where('month', date('F'))
        ->where('year', date('Y'))
        ->paginate(10);
        return SalaryCollection::collection($CurrentMonthSalarySheet);
    }

    public function getAllUnpaidEmployeeOfCurrentMonth($departmentId){
        date_default_timezone_set('Asia/Dhaka');
         $CurrentMonthUnpaidEmployees = Employee::where('department_id', $departmentId)->get()
         ->filter(function($dep){
            return $dep->last_salary_pay_month !== date('F');
        })
        ->map(function($emp){
            return [
                'id' => $emp->id,
                'name' => $emp->name,
                'emp_id' => $emp->employee_id,
                'current_month_salary' => $emp->got_current_month_salary == date('F') ?'Paid' : 'Yet to pay',
                'last_paid_salary' => $emp->last_salary_pay ? $emp->last_salary_pay : 'Joined in current month',
                'photo' => asset('public/storage/employees/'.$emp->photo),
                'place' => $emp->place,
                'qualification' => $emp->qualification,
                'salary' => $emp->salary,
            ];
        });
        $Department = Department::where('id', $departmentId)->first();
        return response()->json(['data'=> $CurrentMonthUnpaidEmployees, 'department'=> $Department->name], 200);
        
    }
    public function previousAllMonthsForSalarySheet()
    {
        date_default_timezone_set('Asia/Dhaka');
        $months = Salary::where('year', date('Y'))->select(['month'])->distinct()->get();
        
        return response()->json(['data'=>$months],200);
        

    }

    public function particularMonthSalaryList($month)
    {
        $particularMonthSalary = Salary::with(['employee'])
        ->where('month', $month)
        ->where('year', date('Y'))
        ->paginate(10);
        return SalaryCollection::collection($particularMonthSalary);
    }
    public function particularMonthEmployeeSearchSalarySheet($month, $searchField)
    {
        $search = Salary::with(['employee'])->where('emp_id_for_search', 'LIKE', "%$searchField%")->where('month', $month)->where('year', date('Y'))->paginate(10);
        return SalaryCollection::collection($search);
    }
    
}
