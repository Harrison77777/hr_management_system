<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\Resource;

class EmployeeCollection extends Resource
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
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'department' => $this->department->name,
            'place' => $this->place,
            'salary' => $this->salary,
            'photo' => asset('public/storage/employees/'.$this->photo),
        ];
    }
}
