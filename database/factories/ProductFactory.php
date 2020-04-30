<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker ->text(700),
        'price' => $faker->randomNumber($nbDigits = 3), 
        'stock' =>  $faker->randomNumber($nbDigits = 1),
        'flag' => $faker->boolean,

    ];
});
