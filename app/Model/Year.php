<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Movie;
use App\Model\Tvshow;

class Year extends Model

{

    public function movies()
    {
        return $this->morphedByMany(Movie::class,'yeartable');
    }

    public function tvshows()
    {
        return $this->morphedByMany(Tvshow::class,'yeartable');
    }

    public function books()
    {
        return $this->morphedByMany(Book::class,'authorble');
    }
  
}