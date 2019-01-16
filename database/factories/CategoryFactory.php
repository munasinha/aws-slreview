<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Action', 'Comedy', 'Advencher', 'Drama', 'Animation', 'Crime', 'Thriller', 'Horror', 'Romance'])
    ];
});
