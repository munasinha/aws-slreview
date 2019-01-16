<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Year::class, function (Faker $faker) {
    return [
        
        'year' => $faker->year,

        'whichyear_type' => $faker->randomElement(['movie', 'tvshow']),

        'whichyear_id' => $faker->numberBetween(1,30)
        
    ];
});
