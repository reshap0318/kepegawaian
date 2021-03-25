<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\{
    Index as PegawaiIndex,
    User\edit as PegawaiEdit,
    User\Profile as Profile,
    Pangkat\Create as PegawaiPangkatCreate,
    Pangkat\Edit as PegawaiPangkatEdit,
    Mutasi\Create as PegawaiMutasiCreate,
    Mutasi\Edit as PegawaiMutasiEdit,
    Fungsional\Create as PegawaiFungsionalCreate,
    Fungsional\Edit as PegawaiFungsionalEdit,
    Jabatan\Create as PegawaiJabatanCreate,
    Jabatan\Edit as PegawaiJabatanEdit,
};

Route::get('profile', Profile::class)->name('profile');
Route::middleware(['auth','can:pegawai'])->prefix('pegawai')->as('frontend.')->group(function () {
    Route::get('', PegawaiIndex::class)->name('pegawai.index');
    Route::get('/edit', PegawaiEdit::class)->name('pegawai.edit');
    
    Route::prefix('fungsional')->group(function () {
        Route::get('/create', PegawaiFungsionalCreate::class)->name('pegawaiFungsionals.create');
        Route::get('/{pegawaiFungsional}/edit', PegawaiFungsionalEdit::class)->name('pegawaiFungsionals.edit');
    });

    Route::prefix('jabatan')->group(function () {
        Route::get('/create', PegawaiJabatanCreate::class)->name('pegawaiJabatans.create');
        Route::get('/{pegawaiJabatan}/edit', PegawaiJabatanEdit::class)->name('pegawaiJabatans.edit');
    });

    Route::prefix('pangkat')->group(function () {
        Route::get('/create', PegawaiPangkatCreate::class)->name('pegawaiPangkats.create');
        Route::get('/{pegawaiPangkat}/edit', PegawaiPangkatEdit::class)->name('pegawaiPangkats.edit');
    });

    Route::prefix('mutasi')->group(function () {
        Route::get('/create', PegawaiMutasiCreate::class)->name('pegawaiMutasis.create');
        Route::get('/{mutasi}/edit', PegawaiMutasiEdit::class)->name('pegawaiMutasis.edit');
    });
});

