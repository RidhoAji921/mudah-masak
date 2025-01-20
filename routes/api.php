<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ToolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/api/categories/search', [CategoryController::class, 'search'])->name('categories.search');
Route::get('/api/tools/search', [ToolController::class, 'search'])->name('tools.search');
Route::get('/api/ingredients/search', [IngredientController::class, 'search'])->name('ingredients.search');
