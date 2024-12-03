<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', [DeviceController::class, 'index']);
Route::post('/control', [DeviceController::class, 'control'])->name('control');
Route::post('/notify', [DeviceController::class, 'receiveNotification']);
Route::get('/status', [DeviceController::class, 'getStatus'])->name('getStatus');
