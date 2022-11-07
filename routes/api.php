<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// GUARDARE LE ROUTE API DISPONIBILI VIA TERMINALE: php artisan route:list

// Come ricevere tutti i risultati: /nome-route
// Come ricevere un risultato specifico: /nome-route/{slug}

// Come filtrare i risultati: /nome-route?filter[attributo]=specifica -> /restaurants?filter[slug]=sushi
// Come filtrare i risultati AND: /nome-route?filter[attributo]=specifica&filter[attributo]=specifica -> /restaurants?filter[slug]=sushi&filter[slug]=fast
// Come filtrare i risultati OR: /nome-route?filter[attributo]=specifica,altra-specifica -> /restaurants?filter[slug]=sushi,fast

// Come ordinare i risultati i risultati ORDINE CRESCENTE: /nome-route?sort=attributo -> /restaurants/nome-ristorante/products?sort=price
// Come ordinare i risultati i risultati ORDINE DECRESCENTE: /nome-route?sort=-attributo -> /restaurants/nome-ristorante/products?sort=-price

// Come includere una relazione: /nome-route?include=relazione -> /restaurants?include=categories
// Come includere PIÙ relazioni: /nome-route?include=relazione -> /restaurants?include=categories,products

Route::namespace('Api')
    ->group(function () {
        Route::apiResource('categories', 'CategoryController')
            ->only(['index', 'show']);

        Route::apiResource('restaurants', 'RestaurantController')
            ->only(['index', 'show']);

        Route::apiResource('restaurants.products', 'ProductController')
            ->only(['index', 'show']);
    });
