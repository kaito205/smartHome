<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class DeviceController extends Controller {

    private $arduinoUrl = 'http://192.168.113.200'; // Ganti dengan IP NodeMCU Anda

    public function index() {
        return view('index');
    }

    public function control(Request $request) {
        $device = $request->input('device');
        $status = $request->input('status');

        $response = Http::get($this->arduinoUrl . "/control", [
            'device' => $device,
            'status' => $status
        ]);

        return back()->with('message', 'Device control request sent!');
    }

    public function getStatus(Request $request) {
        // Ambil status dari NodeMCU
        $response = Http::get($this->arduinoUrl . "/status");

        return response()->json($response->json());
    }
}
