<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Book;

class Author extends Model
{
    protected $fillable = ["name", "image", "first_book", "best_book"];

    public function books()
    {
        return $this->morphedByMany(Book::class,'authorble');
    }
}
