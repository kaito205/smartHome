<?php

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Endpoint untuk toggle LED
Route::post('/led-toggle/{id}', function ($id) {
    $led = Device::findOrFail($id);
    $led->status = !$led->status; // Ubah status (toggle)
    $led->save();

    return response()->json([
        'success' => true,
        'message' => "LED {$led->name} berhasil diubah",
        'status' => $led->status,
    ]);
});

