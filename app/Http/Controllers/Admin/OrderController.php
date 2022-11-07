<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Traits\IsCorrectOwner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use IsCorrectOwner;

    /**
     * Display a listing of the resource.
     *
     * @param  Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $this->redirectIfNotOwner($restaurant);

        $orders = $restaurant->products
            ->flatMap(function ($product) {
                return $product->orders;
            })
            ->unique('id');

        return view('admin.orders.index', compact(['restaurant', 'orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, Order $order)
    {
        $this->redirectIfNotOwner($restaurant);

        $products = $order->products;

        return view('admin.orders.show', compact(['restaurant', 'order', 'products']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // NOT IMPLEMENTED
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // NOT IMPLEMENTED
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Restaurant  $restaurant
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Order $order)
    {
        $order->delete();

        return redirect()->route('admin.restaurants.show', $restaurant);
    }
}
