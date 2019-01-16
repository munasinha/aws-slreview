<?php

namespace App\Http\Resources\Year;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Movie\MovieCollectionResource;
use App\Http\Resources\Tvshow\TvshowCollectionResource;

class YearResource extends JsonResource
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
            'year' => $this->year,
            'movies' => MovieCollectionResource::collection($this->movies),
            'tvshows' => TvshowCollectionResource::collection($this->tvshows)
        ];
    }
}
