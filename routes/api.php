<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/recipe/search', [SearchController::class, 'index']);

Route::get('/category/{category:slug}', [CategoryController::class, 'show']);
Route::apiResource('/categories', CategoryController::class);

Route::get('/recipe/{recipe:slug}', [RecipeController::class, 'show']);
Route::apiResource('/recipes', RecipeController::class);
