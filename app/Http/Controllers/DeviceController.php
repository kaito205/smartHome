<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = [
            (object) ['name' => 'Lamp', 'status' => 'off'],
            (object) ['name' => 'Fan', 'status' => 'off'],
            (object) ['name' => 'TV', 'status' => 'off'],
            (object) ['name' => 'Heater', 'status' => 'off'],
            (object) ['name' => 'AC', 'status' => 'off'],
        ];
        return view('index', compact('devices'));
    }



    // Mengubah status perangkat
    public function toggle(Request $request)
    {
        $device = $request->input('object'); // Nama perangkat
        $state = $request->input('state');  // Status perangkat

        // Validasi input
        if (!in_array($device, ['Lamp', 'Fan', 'TV', 'Heater', 'AC']) || !in_array($state, ['on', 'off'])) {
            return response()->json(['message' => 'Invalid device or state'], 400);
        }

        // Simpan status perangkat (opsional: gunakan database untuk persistensi)
        // Contoh penyimpanan sementara
        session([$device => $state]);

        return response()->json(['message' => "{$device} turned {$state}"], 200);
    }
}
