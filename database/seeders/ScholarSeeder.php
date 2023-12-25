<?php

namespace Database\Seeders;

use App\Models\Scholar;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ScholarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        File::cleanDirectory(storage_path('app/public/profile_photos'));
        User::create([
            'name' => 'Jules Wesley Marcelino',
            'email' => 'juleswesley.marcelino@sksu.edu.ph',
            'password' => 'password',
        ]);
        Scholar::factory()->count(5)->create();
    }
}
