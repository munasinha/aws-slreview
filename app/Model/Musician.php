<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Movie;
use App\Model\Tvshow;

class Musician extends Model
{
    public function movies()
    {
        return $this->morphedByMany(Movie::class,'musiciable');
    }

    public function tvshows()
    {
        return $this->morphedByMany(Tvshow::class,'musiciable');
    }
}
