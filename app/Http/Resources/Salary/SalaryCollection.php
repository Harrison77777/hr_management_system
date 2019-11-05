<?php

namespace App\Http\Resources\Salary;

use Illuminate\Http\Resources\Json\Resource;

class SalaryCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'employee_name' => $this->employee->name,
            'employee_id' => $this->emp_id_for_search,
            'department' => $this->employee->department->name,
            'place' => $this->employee->place,
            'salary' => $this->employee->salary,
            'month' => $this->month,
            'year' => $this->year,
            'date' => $this->date,
            'photo' => asset('public/storage/employees/'.$this->employee->photo),
            'paid_amount' => $this->salary_amount,
        ];
    }
}
