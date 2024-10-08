<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\RecipeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $recipes = Recipe::with(['author'])
            ->where('name', 'like', '%' . $query . '%')
            ->get();
        return RecipeResource::collection($recipes);
    }
}
