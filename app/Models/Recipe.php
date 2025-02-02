<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = ['id'];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_recipe');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipe')->withPivot("amount", "unit_id");
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'tool_recipe');
    }

    public function steps()
    {
        return $this->hasMany(RecipeStep::class)->orderBy('step_number');
    }
}
