<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Device::create(['name' => 'Lampu Ruang Tamu', 'status' => true]);
        Device::create(['name' => 'Lampu Kamar', 'status' => false]);
        Device::create(['name' => 'Lampu Dapur', 'status' => true]);
        Device::create(['name' => 'AC', 'status' => false]);
        Device::create(['name' => 'Kipas Angin', 'status' => true]);
    }
}
