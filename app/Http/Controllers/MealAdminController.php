<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Lumen\Routing\Controller;

class MealAdminController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => ['required', Rule::in([Meal::TYPE_HOMEMADE, Meal::TYPE_RESTAURANT])],
            'image' => 'required|file|mimes:jpeg',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Save image
        $imageFolder = 'images';
        $imageName = uniqid('meal-') . '.jpeg';

        $image = $request->file('image');
        $image->move(storage_path('app/public/' . $imageFolder), $imageName);

        /** @var Meal $meal */
        $meal = Meal::create($request->input() + [
                'image' => "$imageFolder/$imageName",
            ]);

        return $meal->load('links');
    }

    public function createLink(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'required|integer|exists:meals,id',
            'title' => 'required',
            'url' => 'required|url',
        ]);

        /* @var $meal Meal */
        $meal = Meal::find($request->input('post_id'));

        $link = new Link();
        $link->fill($request->input());
        $meal->links()->save($link);

        return $link;
    }
}
