<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function createView() {
        return view('create_recipe');
    }

    function store(Request $request) {
        // $validatedRequest = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'required',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        // ]);
        $ingredients = explode(',', $request->input('ingredients'));
        $processedIngredients = [];

        foreach ($ingredients as $ingredientId) {
            $processedIngredients[] = [
                'ingredient_id' => $ingredientId,
                'amount' => $request->input("amount-{$ingredientId}"),
                'unit' => $request->input("unit-{$ingredientId}")
            ];
        }

        $processedStep = [];
        foreach ($ingredients as $ingredientId) {
            $processedIngredients[] = [
                'ingredient_id' => $ingredientId,
                'amount' => $request->input("amount-{$ingredientId}"),
                'unit' => $request->input("unit-{$ingredientId}")
            ];
        }
        $result = [$processedIngredients, $request->input("steps")];
        dd($result);
    }
}
