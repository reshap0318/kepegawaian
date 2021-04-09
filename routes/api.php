<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    FungsionalController,
    JabatanUnitController,
    PegawaiController,
    PangkatGolonganController,
    UnitController,
};

Route::middleware(['api_key'])->group(function () {
    
});

    Route::get('pegawai', [PegawaiController::class, 'index']);
    Route::get('pegawai/{pegawai}', [PegawaiController::class, 'show']);

    Route::get('pangkat-golongan', [PangkatGolonganController::class, 'index']);
    Route::get('pangkat-golongan/{pangkatGolongan}', [PangkatGolonganController::class, 'show']);

    Route::get('unit', [UnitController::class, 'index']);
    Route::get('unit/{unit}', [UnitController::class, 'show']);

    
    Route::get('fungsional', [FungsionalController::class, 'index']);
    Route::get('fungsional/{fungsional}', [FungsionalController::class, 'show']);

    Route::get('jabatan-unit', [JabatanUnitController::class, 'index']);
    Route::get('jabatan-unit/{jabatanUnit}', [JabatanUnitController::class, 'show']);

    Route::get('pegawai', [PegawaiController::class, 'index']);
    Route::prefix('pegawai/{pegawai}')->group(function () {
        Route::get('', [PegawaiController::class, 'show']);
        Route::get('jabatan', [PegawaiController::class, 'jabatanIndex']);
        Route::get('jabatan/{pegawaiJabatan}', [PegawaiController::class, 'jabatanShow']);

        Route::get('fungsional', [PegawaiController::class, 'fungsionalIndex']);
        Route::get('fungsional/{pegawaiFungsional}', [PegawaiController::class, 'fungsionalShow']);

        Route::get('pangkat-golongan', [PegawaiController::class, 'pangkatIndex']);
        Route::get('pangkat-golongan/{pegawaiPangkat}', [PegawaiController::class, 'pangkatShow']);
        
        Route::get('mutasi', [PegawaiController::class, 'mutasiIndex']);
        Route::get('mutasi/{mutasi}', [PegawaiController::class, 'mutasiShow']);
    });
