<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Restaurant;
use App\Http\Controllers\Controller;
use App\Traits\IsCorrectOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    use IsCorrectOwner;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Auth::user()->restaurants;
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->redirectOnRequirementFail();

        return view('admin.restaurants.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->redirectOnRequirementFail();

        $data = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|max:255|unique:restaurants',
            'phone' => 'required|string|min:12|max:14|unique:restaurants|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
            'street_address' => 'required|string|max:255',
            'city' => 'nullable|sometimes|string|min:3|max:50',
            'region' => 'nullable|sometimes|string|min:3|max:50',
            'state' => 'nullable|sometimes|string|min:3|max:50',
            'zip_code' => 'required|numeric',
            'image' => 'nullable|sometimes|mimes:jpg,jpeg,png|max:2000',
            'categories' => 'required|exists:categories,id'
        ]);

        $restaurant = new Restaurant();
        $restaurant->fill($data);
        $restaurant->user_id = Auth::id();
        $restaurant->city = 'Roma';
        $restaurant->region = 'Lazio';
        $restaurant->state = 'Italia';

        if (isset($data['image']))
        {
            $restaurant->image = Storage::put('uploads', $data['image']);
        }

        $restaurant->save();

        $restaurant->categories()->sync($data['categories']);

        return redirect()->route('admin.restaurants.show', $restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $this->redirectIfNotOwner($restaurant);
        
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        // NOT IMPLEMENTED
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        // NOT IMPLEMENTED
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->image)
        {
            Storage::delete($restaurant->image);
        }

        $restaurant->delete();

        return redirect()->route('admin.home');
    }

    private function redirectOnRequirementFail()
    {
        // CURRENT IMPLEMENTATION: Only 1 restaurant per user.
        if (Auth::user()->restaurants->count() >= 1)
        {
            return redirect()->route('admin.dashboard')->send();
        }
    }
}