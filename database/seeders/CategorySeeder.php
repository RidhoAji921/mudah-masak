<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manualCategories = [
            ['category' => 'Cemilan'],
            ['category' => 'Kue'],
            ['category' => 'Gorengan'],
            ['category' => 'Makanan Sehat'],
            ['category' => 'Makanan Diet'],
            ['category' => 'Makanan Manis'],
            ['category' => 'Gurih'],
            ['category' => 'Pedas'],
            ['category' => 'Manis'],
            ['category' => 'Mudah'],
            ['category' => 'Murah'],
            ['category' => 'Cukup 3 Bahan'],
            ['category' => 'Tanpa Mixer'],
            ['category' => 'Tanpa Oven'],
            ['category' => 'Rendah Gula'],
            ['category' => 'Tanpa Micin'],
        ];

        // Insert data manual ke database
        foreach ($manualCategories as $category) {
            Category::create($category);
        }
    }
}
