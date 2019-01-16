<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Author\AuthorNameResource;
use App\Http\Resources\Category\CategoryNameResource;
use App\Http\Resources\Year\YearNameResource;
use App\Http\Resources\Country\CountryNameResource;

class BookResource extends JsonResource
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
            'author' => AuthorNameResource::collection($this->authors),
            'country' => CountryNameResource::collection($this->country),
            'cover' => $this->cover,
            'description' => $this->description,
            'views' => $this->view_count,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
