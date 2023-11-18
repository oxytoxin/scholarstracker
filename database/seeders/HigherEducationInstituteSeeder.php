<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HigherEducationInstitute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HigherEducationInstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (($handle = fopen(storage_path('csv/uii.csv'), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                for ($c = 0; $c < $num; $c++) {
                    HigherEducationInstitute::create([
                        'name' => $data[$c]
                    ]);
                }
            }
            fclose($handle);
        }
    }
}
