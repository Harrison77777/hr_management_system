<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Salary;
class Employee extends Model
{
    protected $fillable = [
        'name',
        'department_id',
        'email',
        'phone',
        'salary',
        'place',
        'got_current_month_salary',
        'qualification',
        'address',
        'last_salary_pay_month',
        'last_salary_pay_date',
        'previous_place',
        'photo',
        'employee_id',
    ];
    
    public function department(){
        return $this->belongsTo(Department::class);
    }
    
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
    
}
