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
        return $this->belongsToMany(Ingredient::class, 'category_post');
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'category_post');
    }
}
