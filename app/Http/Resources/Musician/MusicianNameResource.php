<?php

namespace App\Http\Resources\Musician;

use Illuminate\Http\Resources\Json\JsonResource;

class MusicianNameResource extends JsonResource
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
