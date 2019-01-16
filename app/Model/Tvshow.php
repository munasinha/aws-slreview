<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tvshow extends Model
{

    protected $fillable = ["name", "poster", "covers", "imdb" , "description" , "trailer"];

    public function actors()
    {
        return $this->morphToMany(Actor::class, 'acteble');
    }

    public function country()
    {
        return $this->morphToMany(Country::class, 'countryble');
    }

    public function directors()
    {
        return $this->morphToMany(Director::class, 'directorble');
    }

    public function musicians()
    {
        return $this->morphToMany(Musician::class, 'musiciable');
    }

    public function producers()
    {
        return $this->morphToMany(Producer::class, 'producerble');
    }

    public function year()
    {
        return $this->morphToMany(Year::class ,'yeartable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class ,'categorybles');
    }


}
