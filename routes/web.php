<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceRecordController;
use App\Models\DeviceRecord;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::prefix('device-record')->group(function () {
        Route::get('data-masuk', [DeviceRecordController::class, 'dataMasuk']);
        Route::get('data-terverifikasi', [DeviceRecordController::class, 'dataTerverifikasi']);
        Route::delete('reject/{deviceRecord}', [DeviceRecordController::class, 'reject']);
        Route::put('verify/{deviceRecord}', [DeviceRecordController::class, 'verify']);
    });

    Route::get('/reset-weh-tin', function () {
        DeviceRecord::whereIn('id', [836, 839, 840, 841, 842])
            ->update([
                'verified_at' => null,
                'deleted_at' => null,
            ]);

        return redirect('/dashboard');
    });
});
