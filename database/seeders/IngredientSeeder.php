<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manualIngredients = [
            ['name' => 'Cabai merah'],
            ['name' => 'Bawang merah'],
            ['name' => 'Bawang putih'],
            ['name' => 'Lada'],
            ['name' => 'Terasi'],
            ['name' => 'Nasi'],
            ['name' => 'Kecap'],
            ['name' => 'Garam'],
            ['name' => 'Gula'],
            ['name' => 'Micin'],
        ];
        
        foreach ($manualIngredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
