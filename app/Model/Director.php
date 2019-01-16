<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Movie;
use App\Model\Tvshow;

class Director extends Model
{
    public function movies()
    {
        return $this->morphedByMany(Movie::class,'directorble');
    }

    public function tvshows()
    {
        return $this->morphedByMany(Tvshow::class,'directorble');
    }
}
