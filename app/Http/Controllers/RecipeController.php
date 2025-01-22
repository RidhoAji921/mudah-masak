<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function createView() {
        $units = Unit::all();
        return view('create_recipe', compact('units'));
    }

    function store(Request $request) {
        $validatedRequest = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'categories' => 'nullable',
            'tools' => 'required',
            'ingredients' => 'required|array',
            'ingredients.*.amount' => 'required|numeric',
            'ingredients.*.unit' => 'required|string',
            'steps' => 'required|array',
            'steps.*.name' => 'required|string',
            'steps.*.description' => 'nullable|string',
            'steps.*.image' => 'nullable|image|max:2048',
        ]);
        // $ingredients = explode(',', $request->input('ingredients'));
        // $processedIngredients = [];

        // foreach ($ingredients as $ingredientId) {
        //     $processedIngredients[] = [
        //         'ingredient_id' => $ingredientId,
        //         'amount' => $request->input("amount-{$ingredientId}"),
        //         'unit' => $request->input("unit-{$ingredientId}")
        //     ];
        // }

        // $processedStep = [];
        // foreach ($ingredients as $ingredientId) {
        //     $processedIngredients[] = [
        //         'ingredient_id' => $ingredientId,
        //         'amount' => $request->input("amount-{$ingredientId}"),
        //         'unit' => $request->input("unit-{$ingredientId}")
        //     ];
        // }
        // $result = [$processedIngredients, $request->input("steps")];
        dd($validatedRequest);
    }
}
