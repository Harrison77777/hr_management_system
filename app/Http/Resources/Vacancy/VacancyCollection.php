<?php

namespace App\Http\Resources\Vacancy;

use Illuminate\Http\Resources\Json\Resource;

class VacancyCollection extends Resource
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
            'id'=> $this->id,
            'name'=> $this->vacancy_name,
            'total_needle'=> $this->needle_number,
        ];
    }
}
