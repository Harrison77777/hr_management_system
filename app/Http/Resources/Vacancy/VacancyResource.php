<?php

namespace App\Http\Resources\Vacancy;

use Illuminate\Http\Resources\Json\JsonResource;

class VacancyResource extends JsonResource
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
            'id'=> $this->id,
            'name' => $this->vacancy_name,
            'education_requirement' => $this->education_requirement,
            'skill_requirement' => $this->skill_requirement,
            'skill_requirement' => $this->skill_requirement,
            'needle_number' => $this->needle_number,
            'company_address' => $this->company_address,
            'company_mail_address' => $this->company_mail_address,
            'all_opportunities' => $this->all_opportunities,
            'salary_range' => $this->salary_range,
        ];
    }
}
