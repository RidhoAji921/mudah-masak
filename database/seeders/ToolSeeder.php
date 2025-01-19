<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manualTools = [
            ['name' => 'Wajan'],
            ['name' => 'Sodet'],
            ['name' => 'Oven'],
            ['name' => 'Mixer'],
        ];
        
        foreach ($manualTools as $tool) {
            Tool::create($tool);
        }
    }
}
