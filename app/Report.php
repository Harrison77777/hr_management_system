<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'employee_name',
        'employee_id',
        'report'
    ];
}
