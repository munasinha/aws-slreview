<?php

namespace App\Http\Resources\Director;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Movie\MovieCollectionResource;

class DirectorResource extends JsonResource
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
            'name' => $this->name,
            'country' => $this->country,
            'image' => $this->image,
            'first_movie' => $this->first_movie,
            'best_movie' => $this->best_movie,
            'imdb_best_movie' => $this->imdb_best_movie,
            'movies' => MovieCollectionResource::collection($this->movies),
        ];
    }
}
