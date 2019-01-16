<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Movie;
use App\Model\Tvshow;

class Producer extends Model
{
    public function movies()
    {
        return $this->morphedByMany(Movie::class,'producerble');
    }

    public function tvshows()
    {
        return $this->morphedByMany(Tvshow::class,'producerble');
    }
}
