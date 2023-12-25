<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ScholarshipStatusSeeder::class);
        $this->call(ScholarshipTypeSeeder::class);
        $this->call(CampusSeeder::class);
        $this->call(HigherEducationInstituteSeeder::class);
        $this->call(ScholarshipCategorySeeder::class);
        $this->call(DegreeProgramSeeder::class);
        $this->call(ScholarSeeder::class);
    }
}
