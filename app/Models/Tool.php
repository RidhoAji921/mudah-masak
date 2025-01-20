<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public $timestamps = false;

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'tool_recipe');
    }
}
