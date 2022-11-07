<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Restaurant;
use Faker\Generator as FakerGen;
use Faker\Factory as FakerFactory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (FakerGen $faker) {
    $faker = FakerFactory::create('it_IT');
    $faker->addProvider(new Faker\Provider\it_IT\Text($faker));
    
    return [
        'restaurant_id' => Restaurant::inRandomOrder()->first(),
        'name' => $faker->words(rand(2, 4), true),
        'description' => $faker->text(rand(40, 120)),
        'price' => rand(1, 20),
        'is_available' => $faker->boolean,
    ];
});
