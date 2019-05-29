<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Breed;
use Faker\Generator as Faker;

$factory->define(Breed::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
