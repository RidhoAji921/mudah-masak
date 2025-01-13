<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search'); // Ambil query pencarian

        // Cari kategori berdasarkan nama
        $categories = Category::when($query, function($queryBuilder) use ($query) {
            $queryBuilder->where('category', 'LIKE', "%{$query}%");
        })->get();

        // Return hasil pencarian sebagai JSON
        return response()->json($categories);
    }

}
