<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Musician::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,

        'country' => $faker->country,

        'image' => $faker->imageUrl($width = 150, $height = 200),

        'first_movie' => $faker->word,

        'best_movie' => $faker->word,

        'imdb_best_movie' => $faker->word
        
    ];
});
