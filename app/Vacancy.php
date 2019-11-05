<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'vacancy_name',
        'education_requirement',
        'skill_requirement',
        'all_opportunities',
        'company_mail_address',
        'company_address',
        'needle_number',
        'salary_range',
    ];
}
