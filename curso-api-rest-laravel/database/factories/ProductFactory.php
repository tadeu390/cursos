<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'          => $faker->unique()->word,
        'description'   => $faker->sentence(),
        'category_id'   => 1,
    ];
});
