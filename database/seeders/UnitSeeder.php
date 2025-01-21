<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basic_unit = [
            [
                'name' => 'gram',
                'abbreviation' => 'g',
                'conversion_factor' => 1,
                'base_unit' => 'weight'
            ],
            [
                'name' => 'kilogram',
                'abbreviation' => 'kg',
                'conversion_factor' => 1000,
                'base_unit' => 'weight'
            ],
            [
                'name' => 'liter',
                'abbreviation' => 'l',
                'conversion_factor' => 1,
                'base_unit' => 'volume'
            ],
            [
                'name' => 'mililiter',
                'abbreviation' => 'ml',
                'conversion_factor' => 0.001,
                'base_unit' => 'volume'
            ],
        ];

        foreach ($basic_unit as $unit) {
            Unit::create($unit);
        }
    }
}
