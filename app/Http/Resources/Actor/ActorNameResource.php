<?php

namespace App\Http\Resources\Actor;

use Illuminate\Http\Resources\Json\JsonResource;

class ActorNameResource extends JsonResource
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
            'name' => $this->name,
            'image' => $this->image,
            'id' => $this->id
        ];
    }
}
