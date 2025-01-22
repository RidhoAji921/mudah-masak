<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_recipe');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_post');
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'tool_post');
    }

    public function steps()
    {
        return $this->hasMany(RecipeStep::class)->orderBy('step_number');
    }
}
