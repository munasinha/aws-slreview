<?php

namespace App\Http\Resources\Movie;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category\CategoryNameResource;
use App\Http\Resources\Year\YearNameResource;

class MovieCollectionResource extends JsonResource
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
            'category' => CategoryNameResource::collection($this->Categories),
            'imdb'=> $this->imdb,
            'views' => $this->view_count,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
