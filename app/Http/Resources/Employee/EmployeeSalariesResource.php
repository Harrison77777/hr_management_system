<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeSalariesResource extends JsonResource
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
               'employee_id' => $this->employee_id,
               'salary' => $this->salary,
               'salaries' => $this->salaries->filter(function($salaries){
                  return $salaries->year == date('Y');
               })->map(function($salary){
                  return [
                     'id' => $salary->id,
                     'month' => $salary->month,
                     'year' => $salary->year,
                     'date' => $salary->date,
                     'paid_amount' => $salary->salary_amount,
                  ];
               }),
            ];
       
        
    }
}
