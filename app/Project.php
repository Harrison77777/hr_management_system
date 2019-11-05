<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
class Project extends Model
{
    protected $fillable = [

        'project_name',
        'main_contributor',
        'responsible_team',
        'project_budget',
        'client_name',
        'project_length',
        'project_brief',
        
    ];


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
}
