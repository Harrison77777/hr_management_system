<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Resources\Json\Resource;

class ProjectCollection extends Resource
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
            'project_name' => $this->project_name,
            'project_budget' => $this->project_budget,
            'client_name' => $this->client_name,
            'project_length' => $this->project_length,
            'main_contributor' => $this->main_contributor,
            'completion_status' => $this->completion_status,
            'responsible_team' => $this->responsible_team,
        ];
    }
}
