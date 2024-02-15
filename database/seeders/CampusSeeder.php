<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campus::create([
            'name' => 'ACCESS',
        ]);
        Campus::create([
            'name' => 'TACURONG',
        ]);
        Campus::create([
            'name' => 'ISULAN',
        ]);
        Campus::create([
            'name' => 'LUTAYAN',
        ]);
        Campus::create([
            'name' => 'BAGUMBAYAN',
        ]);
        Campus::create([
            'name' => 'KALAMANSIG',
        ]);
        Campus::create([
            'name' => 'PALIMBANG',
        ]);
    }
}
