<?php

namespace App\Http\Resources\Expanse;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpanseResource extends JsonResource
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
            'details' => $this->details,
            'amount' => $this->amount,
            'month' => $this->month,
            'date' => $this->date,
            'year' => $this->year,
        ];
    }
}
