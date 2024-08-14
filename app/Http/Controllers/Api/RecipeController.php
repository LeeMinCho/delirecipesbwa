<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\RecipeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipe = Recipe::with(['category', 'photos'])->get();
        return RecipeResource::collection($recipe);
    }

    public function show(Recipe $recipe)
    {
        $recipe->load(['category', 'photos', 'tutorials', 'author', 'recipeIngredients.ingredient']);
        return new RecipeResource($recipe);
    }
}
