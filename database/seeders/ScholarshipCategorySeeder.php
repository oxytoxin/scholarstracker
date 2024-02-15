<?php

namespace Database\Seeders;

use App\Models\ScholarshipCategory;
use Illuminate\Database\Seeder;

class ScholarshipCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScholarshipCategory::create([
            'name' => 'A',
        ]);

        ScholarshipCategory::create([
            'name' => 'D',
        ]);

        ScholarshipCategory::create([
            'name' => 'E',
        ]);

        ScholarshipCategory::create([
            'name' => 'F',
        ]);

        ScholarshipCategory::create([
            'name' => 'Special Provision',
        ]);
    }
}
