<?php

namespace Database\Seeders;

use App\Models\DegreeProgram;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DegreeProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DegreeProgram::create([
            'name' => 'Doctor of Philosophy in Biology'
        ]);
        DegreeProgram::create([
            'name' => 'Doctor of Technology Education'
        ]);
        DegreeProgram::create([
            'name' => 'PhD in Education major in Physical Education'
        ]);
        DegreeProgram::create([
            'name' => 'Doctor of Education Major in Educational Management'
        ]);
        DegreeProgram::create([
            'name' => 'PhD in Education Major in Curriculum Development'
        ]);
    }
}
