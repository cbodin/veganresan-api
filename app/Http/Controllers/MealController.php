<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Laravel\Lumen\Routing\Controller;

class MealController extends Controller
{
    public function list()
    {
        return Meal::with('links')
            ->orderByDesc('created_at')
            ->get();
    }
}
