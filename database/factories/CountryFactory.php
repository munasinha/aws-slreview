<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Country::class, function (Faker $faker) {
    return [
        'name' => $faker->country
    ];
});
