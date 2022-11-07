<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $products = QueryBuilder::for(Product::class)
            ->allowedFilters(['name', 'slug', 'description', 'price', 'is_available'])
            ->allowedIncludes(['restaurant'])
            ->allowedSorts(['name', 'price', 'is_available'])
            ->where('restaurant_id', $restaurant->id)
            ->get();

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Restaurant  $restaurant
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, string $slug)
    {
        $product = QueryBuilder::for(Product::class)
            ->allowedIncludes(['restaurant'])
            ->where('restaurant_id', $restaurant->id)
            ->where('slug', $slug)
            ->first();

        return $product ?? response([
            'message' => "This product doesn't exists in this restaurant."
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
    }
}
