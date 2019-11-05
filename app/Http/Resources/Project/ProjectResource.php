<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'project_name' => $this->project_name,
            'main_contributor' => $this->main_contributor,
            'responsible_team' => $this->responsible_team,
            'completion_status' => $this->completion_status,
            'project_brief' => $this->project_brief,
            'project_length' => $this->project_length,
            'client_name' => $this->client_name,
            'project_budget' => $this->project_budget,
            'tasks' => $this->tasks->map(function($task){
                        return [
                            'id' => $task->id,
                            'task_name' => $task->task,
                            'is_completed' => $task->is_completed,
                        ];
            }),
        ];
    }
}
