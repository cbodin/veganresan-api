<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class MealAdminController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|file|mimes:jpeg',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Save image
        $imageFolder = 'public/images';
        $imageName = uniqid('meal-') . '.jpeg';

        $image = $request->file('image');
        $image->move(storage_path($imageFolder), $imageName);

        return Meal::create($request->input() + [
                'image' => "$imageFolder/$imageName",
            ]);
    }
}
