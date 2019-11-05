<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expanse extends Model
{
    protected $fillable = [

        'details',
        'amount',
        'data',
        'month',
        'year'

    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
}
