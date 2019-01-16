<?php

namespace App\Http\Resources\Author;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Book\BookCollectionResource;

class AuthorResource extends JsonResource
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
            'image' => $this->image,
            'first_book' => $this->first_book,
            'best_book' => $this->best_book,
            'books' => BookCollectionResource::collection($this->books),
        ];
    }
}
