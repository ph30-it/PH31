<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Cat;
use App\Breed;
use Faker\Generator as Faker;

$factory->define(Cat::class, function (Faker $faker) {
    $listBreedId= Breed::pluck('id'); //lấy tất cả id của bảng breeds
    return [
        'name' => $faker->name,
        'age' => rand(2,10),
        'breed_id' => $faker->randomElement($listBreedId)
    ];
});
