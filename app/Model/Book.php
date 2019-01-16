<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["name", "poster", "covers", "description"];

    public function country()
    {
        return $this->morphToMany(Country::class, 'countryble');
    }

    public function year()
    {
        return $this->morphToMany(Year::class ,'yeartable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class ,'categorybles');
    }

    public function authors()
    {
        return $this->morphToMany(Author::class, 'authorble');
    }
}
