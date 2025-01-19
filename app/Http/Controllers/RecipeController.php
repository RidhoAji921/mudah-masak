<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    function createView() {
        return view('create_recipe');
    }
}
