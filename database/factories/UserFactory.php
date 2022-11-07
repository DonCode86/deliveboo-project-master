<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

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

$factory->define(User::class, function (FakerGen $faker) {
    $faker = FakerFactory::create('it_IT');
    $faker->addProvider(new Faker\Provider\it_IT\Company($faker));
    
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('test-user'),
        'phone' => $faker->unique()->e164PhoneNumber,
        'vat' => $faker->unique()->vat(false),
        'remember_token' => Str::random(10),
    ];
});
