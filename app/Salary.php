<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Salary extends Model
{
    protected $fillable = [
        'employee_id',
        'salary_amount',
        'date',
        'month',
        'year',
        'paid_by'
    ];

    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
}
