<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as FakerGen;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

$factory->define(Order::class, function (FakerGen $faker) {
    $faker = FakerFactory::create('it_IT');
    
    return [
        'customer_first_name' => $faker->firstName(),
        'customer_last_name' => $faker->lastName,
        'customer_email' => $faker->safeEmail,
        'customer_phone' => $faker->e164PhoneNumber,
        'customer_street_address' => $faker->streetAddress,
        'customer_city' => 'Roma',
        'customer_region' => 'Lazio',
        'customer_state' => 'Italy',
        'customer_zip_code' => $faker->postcode,
        'total' => $faker->randomFloat(2, 1, 100)
    ];
});
