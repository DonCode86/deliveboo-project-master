<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->restaurants->count() <= 0)
        {
            return redirect()->route('admin.restaurants.create');
        }

        return view('admin.dashboard', compact('user'));
    }
}
