<?php

namespace App\Traits;

use App\Restaurant;
use Illuminate\Support\Facades\Auth;

trait IsCorrectOwner
{
    public function redirectIfNotOwner(Restaurant $restaurant, string $route = 'admin.forbidden')
    {
        if (!$this->isCorrectOwner($restaurant))
        {
            return redirect()->route($route)->send();
        }
    }

    private function isCorrectOwner(Restaurant $restaurant)
    {
        return $restaurant->user_id === Auth::id();
    }
}