<?php

namespace Database\Seeders;

use App\Models\ScholarshipType;
use Illuminate\Database\Seeder;

class ScholarshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScholarshipType::create([
            'name' => 'Institutional',
        ]);
        ScholarshipType::create([
            'name' => 'CHED K-12 (Doctoral)',
        ]);
        ScholarshipType::create([
            'name' => 'CHED K-12 ( Masteral)',
        ]);
        ScholarshipType::create([
            'name' => 'CHED SIKAP',
        ]);
        ScholarshipType::create([
            'name' => 'DOST',
        ]);
        ScholarshipType::create([
            'name' => 'FOREIGN SCHOLARSHIP',
        ]);
        ScholarshipType::create([
            'name' => 'OTHER SCHOLARSHIP',
        ]);
    }
}
