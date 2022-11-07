<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\OrderProduct;
use App\Product;

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

$factory->define(OrderProduct::class, function () {
    $product = Product::inRandomOrder()->first();
    $quantity = rand(1, 5);

    return [
        'order_id' => Order::inRandomOrder()->first()->id,
        'product_id' => $product->id,
        'quantity' => $quantity,
    ];
});
