<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
class Task extends Model
{
    protected $fillable = [
        'task',
        'is_completed',
        'project_id',
    ];

    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
}
