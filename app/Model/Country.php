<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Movie;
use App\Model\Tvshow;

class Country extends Model
{
    public function movies()
    {
        return $this->morphedByMany(Movie::class,'countryble');
    }

    public function tvshows()
    {
        return $this->morphedByMany(Tvshow::class,'countryble');
    }

    public function books()
    {
        return $this->morphedByMany(Book::class,'authorble');
    }
}
