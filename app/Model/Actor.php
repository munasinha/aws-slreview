<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Movie;
use App\Model\Tvshow;

class Actor extends Model
{
    protected $fillable = ["name", "country", "first_movie", "best_movie" , "imdb_best_movie"];

    public function movies()
    {
        return $this->morphedByMany(Movie::class,'acteble');
    }

    public function tvshows()
    {
        return $this->morphedByMany(Tvshow::class,'acteble');
    }
}
