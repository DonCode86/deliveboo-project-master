<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\CategoryRestaurant;
use App\Restaurant;

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

$factory->define(CategoryRestaurant::class, function () {
    return [
        'category_id' => Category::inRandomOrder()->first()->id,
        'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
    ];
});
