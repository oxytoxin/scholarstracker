<?php

namespace Database\Seeders;

use App\Models\ScholarshipStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScholarshipStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScholarshipStatus::create([
            'name' => 'Ongoing',
        ]);
        ScholarshipStatus::create([
            'name' => 'Completed',
        ]);
        ScholarshipStatus::create([
            'name' => 'For BOR Approval',
        ]);
        ScholarshipStatus::create([
            'name' => 'No Progress',
        ]);
    }
}
