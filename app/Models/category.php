<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'category_recipe');
    }
}
