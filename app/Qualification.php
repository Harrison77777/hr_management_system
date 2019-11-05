<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = [
        'place_name',
        'education_qualification',
        'skill_qualification',
    ];
}
