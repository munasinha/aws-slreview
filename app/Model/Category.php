<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Movie;
use App\Model\Tvshow;
use App\Model\Book;

class Category extends Model
{
    public function movies()
    {
        return $this->morphedByMany(Movie::class,'categorybles');
    }

    public function tvshows()
    {
        return $this->morphedByMany(Tvshow::class,'categorybles');
    }

    public function books()
    {
        return $this->morphedByMany(Book::class,'authorble');
    }
}
