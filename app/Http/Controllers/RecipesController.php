<?php

namespace App\Http\Controllers;

use App\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index()
    {
        $recipes = Recipe::where('created_at', '<', Carbon::now())
            ->orderBy('created_at', 'desc')
//            ->paginate(config('recipe.posts_per_page'));
            ->paginate(10);

        return view('recipes.index', compact('recipes'));
    }

    public function show($slug)
    {
        $recipe = Recipe::whereSlug($slug)->firstOrFail();

        return view('recipes.show')->with('recipe', $recipe);
    }
}
