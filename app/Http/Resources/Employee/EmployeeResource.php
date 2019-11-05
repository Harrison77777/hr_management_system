<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'employee_id' => $this->employee_id,
            'place' => $this->place,
            'salary' => $this->salary,
            'qualification' => $this->qualification,
            'current_month_salary' => $this->got_current_month_salary == date('F') ? 'Paid' : 'Yet to pay',
            'department' => $this->department->name,
            'department_id' => $this->department->id,
            'joining_date' => $this->created_at->toDateTimeString(),
            'last_salary_pay_date' => $this->last_salary_pay_date ? $this->last_salary_pay_date : 'Joined in this month',
            'photo' => asset('public/storage/employees/'.$this->photo)
        ];
    }
}
