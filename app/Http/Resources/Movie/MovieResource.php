<?php

namespace App\Http\Resources\Movie;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category\CategoryNameResource;
use App\Http\Resources\Actor\ActorNameResource;
use App\Http\Resources\Director\DirectorNameResource;
use App\Http\Resources\Producer\ProducerNameResource;
use App\Http\Resources\Musician\MusicianNameResource;
use App\Http\Resources\Year\YearNameResource;
use App\Http\Resources\Country\CountryNameResource;

class MovieResource extends JsonResource
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
            'year' => YearNameResource::collection($this->year),
            'poster' => $this->poster,
            'categories' => CategoryNameResource::collection($this->Categories),
            'actors' => ActorNameResource::collection($this->actors),
            'country' => CountryNameResource::collection($this->country),
            'directors' => DirectorNameResource::collection($this->directors),
            'Producers' => ProducerNameResource::collection($this->producers),
            'musicians' => MusicianNameResource::collection($this->musicians),
            'imdb'=> $this->imdb,
            'trailer' => $this->trailer,
            'description' => $this->description,
            'views' => $this->view_count,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
