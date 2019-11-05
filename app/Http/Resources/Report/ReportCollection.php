<?php

namespace App\Http\Resources\Report;

use Illuminate\Http\Resources\Json\Resource;

class ReportCollection extends Resource
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
            'employee_name' => $this->employee_name,
            'employee_id' => $this->employee_id,
        ];
    }
}
