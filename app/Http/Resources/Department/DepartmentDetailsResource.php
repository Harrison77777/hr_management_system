<?php

namespace App\Http\Resources\Department;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'employees' => $this->employees->map(function($employee){
                return [
                    'id'=> $employee->id,
                    'employee_id'=> $employee->employee_id,
                    'name' => $employee->name,
                    'salary' => $employee->salary,
                    'place' => $employee->place,
                    'qualification' => $employee->qualification,
                    'last_salary_pay_month' => $employee->last_salary_pay_month ? $employee->last_salary_pay_month : 'Joined in current month',
                    'got_current_month_salary' => $employee->got_current_month_salary == date('F') ? "Paid" : 'Not Paid',
                    'last_salary_pay_date' => $employee->last_salary_pay_date ? $employee->last_salary_pay_date : 'Joined in current month',
                    'photo' => asset('public/storage/employees/'.$employee->photo)
                ];
            }),
        ];
    }
}
