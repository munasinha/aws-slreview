<?php

namespace App\Http\Resources\Year;

use Illuminate\Http\Resources\Json\JsonResource;

class YearNameResource extends JsonResource
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
            'name' => $this->year
        ];
    }
}
