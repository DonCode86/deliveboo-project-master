<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use App\User;
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

$factory->define(Restaurant::class, function (FakerGen $faker) {
    $faker = FakerFactory::create('it_IT');
    $faker->addProvider(new Faker\Provider\it_IT\Address($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Company($faker));
    
    return [
        'user_id' => factory(User::class)->create()->id,
        'name' => $faker->company,
        'email' => $faker->unique()->companyEmail,
        'phone' => $faker->unique()->e164PhoneNumber,
        'street_address' => $faker->streetAddress,
        'city' => 'Roma',
        'region' => 'Lazio',
        'state' => 'Italy',
        'zip_code' => $faker->postcode,
    ];
});
