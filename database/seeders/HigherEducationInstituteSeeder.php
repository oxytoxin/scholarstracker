<?php

namespace Database\Seeders;

use App\Models\HigherEducationInstitute;
use Illuminate\Database\Seeder;

class HigherEducationInstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HigherEducationInstitute::query()->delete();
        if (($handle = fopen(storage_path('csv/uii.csv'), 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $num = count($data);
                for ($c = 0; $c < $num; $c++) {
                    HigherEducationInstitute::create([
                        'name' => $data[$c],
                    ]);
                }
            }
            fclose($handle);
        }
    }
}
