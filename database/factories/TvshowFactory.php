<?php

use Faker\Generator as Faker;
use App\Model\Year;
use App\Model\Category;
use App\Model\Actor;
use App\Model\Country;
use App\Model\Director;
use App\Model\Musician;
use App\Model\Producer;

$factory->define(App\Model\Tvshow::class, function (Faker $faker) {
    return [
        
        'name' => $faker->word,

        'poster' => $faker->imageUrl($width = 150, $height = 200),

        'covers' =>  $faker->imageUrl($width = 600, $height = 300),

        'trailer' => 'https://www.youtube.com/watch?v=SKZRjYzi_eM',

        'imdb' => $faker->numberBetween(0,10),

        'description' => $faker->paragraph,

        'view_count' => $faker->numberBetween(1,100),

        'year_id' => function(){
            return Year::all()->random();
        },

        'category_id' => function(){
            return Category::all()->random();
        },

        'actor_id' => function(){
            return Actor::all()->random();
        },

        'country_id' => function(){
            return Country::all()->random();
        },

        'director_id' => function(){
            return Director::all()->random();
        },

        'musicians_id' => function(){
            return Musician::all()->random();
        },

        'Producer_id' => function(){
            return Producer::all()->random();
        },




    ];
});
