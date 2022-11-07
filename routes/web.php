<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/forbidden', fn () => view('admin.forbidden'))->name('forbidden');

        Route::resource('restaurants', 'RestaurantController')
            ->except('update', 'edit');

        Route::resource('restaurants.products', 'ProductController');

        Route::resource('restaurants.orders', 'OrderController')
            ->only('index', 'show');
    });

Route::name('payment.')
    ->group(function () {
        Route::get('/checkout', 'PaymentController@checkout')->name('checkout');
        Route::post('/checkout', 'PaymentController@process')->name('checkout');
    });

Route::get('{any?}', function () {
    return view('front');
})->where('any', '.*');