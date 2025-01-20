<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search'); // Ambil query pencarian

        // Cari kategori berdasarkan nama
        $ingredients = Ingredient::when($query, function($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'LIKE', "%{$query}%");
        })->get();

        // Return hasil pencarian sebagai JSON
        return response()->json($ingredients);
    }

}
