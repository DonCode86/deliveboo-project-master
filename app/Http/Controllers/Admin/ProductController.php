<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Restaurant;
use App\Traits\IsCorrectOwner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    use IsCorrectOwner;

    /**
     * Display a listing of the resource.
     *
     * @param Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $this->redirectIfNotOwner($restaurant);

        $products = $restaurant->products;

        return view('admin.products.index', compact(['products', 'restaurant']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        $this->redirectIfNotOwner($restaurant);

        return view('admin.products.create', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Restaurant $restaurant
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Restaurant $restaurant, Request $request, Product $product)
    {
        $this->redirectIfNotOwner($restaurant);

        $request->validate(['name' => $this->existsAlready($product, $restaurant)]);
        $data = $this->validation($request);

        $product = new Product();
        $product->fill($data);
        $product->restaurant_id = $restaurant->id;

        if (isset($data['image'])) {
            $product->image = Storage::put('uploads', $data['image']);
        }

        $data['is_available'] = isset($data['is_available']);

        $product->is_available = $data['is_available'];

        $product->save();

        return redirect()->route('admin.restaurants.products.index', $restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  Restaurant  $restaurant
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, Product $product)
    {
        $this->redirectIfNotOwner($restaurant);

        return view('admin.products.show', compact(['product', 'restaurant']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Restaurant  $restaurant
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, Product $product)
    {
        $this->redirectIfNotOwner($restaurant);

        return view('admin.products.edit', compact(['product', 'restaurant']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Restaurant  $restaurant
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Restaurant $restaurant, Request $request, Product $product)
    {
        $this->redirectIfNotOwner($restaurant);
        
        $request->validate(['name' => $this->existsAlready($product, $restaurant)]);
        $data = $this->validation($request);

        if (isset($data['image'])) {
            if ($product->image) {
                Storage::delete($product->image);
            }

            $product->image = Storage::put('uploads', $data['image']);
        }

        $data['is_available'] = isset($data['is_available']);

        $product->update($data);

        return redirect()->route('admin.restaurants.products.index', $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Restaurant  $restaurant
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Product $product)
    {
        $this->redirectIfNotOwner($restaurant);
        
        if($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.restaurants.products.index', $restaurant);
    }

    /**
     * Return the validation of the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|sometimes|string',
            'price' => 'required|regex:/^\d{1,3}([,.]\d{0,2})?$/',
            'is_available' => 'sometimes|accepted',
            'image' => 'nullable|sometimes|mimes:jpg,jpeg,png|max:2000'
        ]);
    }

    private function existsAlready(Product $product, Restaurant $restaurant)
    {
        return function ($attribute, $value, $fail) use ($product, $restaurant) {
            if (
                $product
                    ->where($attribute, $value)
                    ->where('id', '!=', $product->id)
                    ->where('restaurant_id', $restaurant->id)
                    ->exists()
            ) {
                $fail('The product with '.$attribute.' "'.$value.'" already exists in this restaurant.');
            }
        };
    }
}
