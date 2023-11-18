<?php

namespace Database\Seeders;

use App\Models\HeiDisconnectionReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeiDisconnectionReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeiDisconnectionReason::create([
            'name' => 'Resignation'
        ]);
        HeiDisconnectionReason::create([
            'name' => 'Termination'
        ]);
        HeiDisconnectionReason::create([
            'name' => 'Health Reasons'
        ]);
        HeiDisconnectionReason::create([
            'name' => 'Others'
        ]);
    }
}
