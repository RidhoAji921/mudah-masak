<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeStep;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function show()
    {
        return view('recipe');
    }
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
        $validatedRequest['slug'] = Str::slug($validatedRequest['name'])."-".time();
        $validatedRequest['user_id'] = Auth::user()->id;

        $recipeImageName = $validatedRequest['slug'].'.'.$validatedRequest['image']->getClientOriginalExtension();
        $validatedRequest['image']->move(public_path('images/'.$validatedRequest['user_id']), $recipeImageName);
        $validatedRequest['thumbnail'] = $recipeImageName;
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
        // dd($validatedRequest);

        $recipe = Recipe::create([
            'name' => $validatedRequest['name'],
            'user_id' => $validatedRequest['user_id'],
            'slug' => $validatedRequest['slug'],
            'description' => $validatedRequest['description'],
            'thumbnail' => $validatedRequest['thumbnail'],
        ]);

        if($request->categories){
            $categoryIds = explode(',', $request->categories);
            $recipe->categories()->attach($categoryIds);
        }

        if($request->tools){
            $toolIds = explode(',', $request->tools);
            $recipe->tools()->attach($toolIds);
        }

        if ($request->has('ingredients')) {
            foreach ($request->input('ingredients') as $ingredientId => $ingredientData) {
                $recipe->ingredients()->attach($ingredientId, [
                    'amount' => $ingredientData['amount'],
                    'unit_id' => $ingredientData['unit']
                ]);
            }
        }

        if ($request->has('steps')) {
            $loopIndex = 0;
            foreach ($request->input('steps') as $step) {
                $stepImageName = null;
                if(isset($step['image'])){
                    $stepImageName = $step['name'].'.'.$step['image']->getClientOriginalExtension();
                    $step['image']->move(public_path('images/'.$validatedRequest['user_id']), $stepImageName);
                }
                RecipeStep::create([
                    'recipe_id' => $recipe->id,
                    'step_name' => $step['name'],
                    'description' => $step['description'],
                    'image' => $stepImageName,
                    'step_number' => $loopIndex+1,
                ]);
                $loopIndex++;
            }
        }
    }
}
