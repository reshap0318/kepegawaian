<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\{
    Permission\Index as PermissionIndex,
    Permission\Create as PermissionCreate,
    Permission\Edit as PermissionEdit,
    Role\Index as RoleIndex,
    Role\Create as RoleCreate,
    Role\Edit as RoleEdit,
    ApiAkses\Index as ApiAksesIndex,
    ApiAkses\Create as ApiAksesCreate,
    ApiAkses\Edit as ApiAksesEdit,
    Unit\Index as UnitIndex,
    Unit\Create as UnitCreate,
    Unit\Edit as UnitEdit,
    Fungsional\Index as FungsionalIndex,
    Fungsional\Create as FungsionalCreate,
    Fungsional\Edit as FungsionalEdit,
    PangkatGolongan\Index as PangkatGolonganIndex,
    PangkatGolongan\Create as PangkatGolonganCreate,
    PangkatGolongan\Edit as PangkatGolonganEdit,
    JabatanUnit\Index as JabatanUnitIndex,
    JabatanUnit\Create as JabatanUnitCreate,
    JabatanUnit\Edit as JabatanUnitEdit,

    Pegawai\Index as PegawaiIndex,
    Pegawai\Show as PegawaiShow,
    Pegawai\Create as PegawaiCreate,
    Pegawai\Edit as PegawaiEdit,
    Pegawai\Fungsional\Index as PegawaiFungsionalIndex,
    Pegawai\Fungsional\Create as PegawaiFungsionalCreate,
    Pegawai\Fungsional\Edit as PegawaiFungsionalEdit,
    Pegawai\Pangkat\Index as PegawaiPangkatIndex,
    Pegawai\Pangkat\Create as PegawaiPangkatCreate,
    Pegawai\Pangkat\Edit as PegawaiPangkatEdit,
    Pegawai\Jabatan\Index as PegawaiJabatanIndex,
    Pegawai\Jabatan\Create as PegawaiJabatanCreate,
    Pegawai\Jabatan\Edit as PegawaiJabatanEdit,
    Pegawai\Mutasi\Index as PegawaiMutasiIndex,
    Pegawai\Mutasi\Create as PegawaiMutasiCreate,
    Pegawai\Mutasi\Edit as PegawaiMutasiEdit,
};

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::middleware(['can:roles_manage'])->group(function () {
        // permission
        Route::get('permissions/create', PermissionCreate::class)->name('permissions.create');
        Route::get('permissions/{permission}/edit', PermissionEdit::class)->name('permissions.edit');
        
        // roles
        Route::get('roles/create', RoleCreate::class)->name('roles.create');
        Route::get('roles/{role}/edit', RoleEdit::class)->name('roles.edit');
        
        // api-akses
        Route::get('api-akses/create', ApiAksesCreate::class)->name('apiAksess.create')->middleware('can:api-akses_manage');
        Route::get('api-akses/{apiAkses}/edit', ApiAksesEdit::class)->name('apiAksess.edit')->middleware('can:api-akses_manage');
    });

    Route::middleware(['can:roles_access'])->group(function () {
        //permission
        Route::get('permissions', PermissionIndex::class)->name('permissions.index'); 
        //roles
        Route::get('roles', RoleIndex::class)->name('roles.index');
        //api-akses
        Route::get('api-akses', ApiAksesIndex::class)->name('apiAksess.index')->middleware('can:api-akses_access');
    });

    Route::prefix('units')->group(function () {
        Route::get('', UnitIndex::class)->middleware('can:units_access')->name('units.index');
        Route::get('/create', UnitCreate::class)->middleware('can:units_manage')->name('units.create');
        Route::get('/{unit}/edit', UnitEdit::class)->middleware('can:units_manage')->name('units.edit');
    });

    Route::prefix('fungsionals')->group(function () {
        Route::get('', FungsionalIndex::class)->middleware('can:fungsionals_access')->name('fungsionals.index');
        Route::get('/create', FungsionalCreate::class)->middleware('can:fungsionals_access')->name('fungsionals.create');
        Route::get('/{fungsional}/edit', FungsionalEdit::class)->middleware('can:fungsionals_access')->name('fungsionals.edit');
    });

    Route::prefix('pangkat-golongans')->group(function () {
        Route::get('', PangkatGolonganIndex::class)->middleware('can:pangkat-golongans_access')->name('pangkatGolongans.index');
        Route::get('/create', PangkatGolonganCreate::class)->middleware('can:pangkat-golongans_access')->name('pangkatGolongans.create');
        Route::get('/{pangkatGolongan}/edit', PangkatGolonganEdit::class)->middleware('can:pangkat-golongans_access')->name('pangkatGolongans.edit');
    });

    Route::prefix('jabatan-units')->group(function () {
        Route::get('', JabatanUnitIndex::class)->middleware('can:jabatan-units_access')->name('jabatanUnits.index');
        Route::get('/create', JabatanUnitCreate::class)->middleware('can:jabatan-units_access')->name('jabatanUnits.create');
        Route::get('/{jabatanUnit}/edit', JabatanUnitEdit::class)->middleware('can:jabatan-units_access')->name('jabatanUnits.edit');
    });

    Route::prefix('pegawai')->group(function () {

        Route::get('', PegawaiIndex::class)->middleware('can:pegawai_access')->name('pegawai.index');
        Route::get('/create', PegawaiCreate::class)->middleware('can:pegawai_manage')->name('pegawai.create');
        Route::get('/{user}', PegawaiShow::class)->middleware('can:pegawai_access')->name('pegawai.show');
        Route::get('/{user}/edit', PegawaiEdit::class)->middleware('can:pegawai_manage')->name('pegawai.edit');

        Route::prefix('{user}')->group(function () {
            Route::prefix('fungsional')->group(function () {
                // Route::get('', PegawaiFungsionalIndex::class)->middleware('can:pegawai-fungsional_access')->name('pegawaiFungsionals.index');
                Route::get('/create', PegawaiFungsionalCreate::class)->middleware('can:pegawai-fungsional_manage')->name('pegawaiFungsionals.create');
                Route::get('/{pegawaiFungsional}/edit', PegawaiFungsionalEdit::class)->middleware('can:pegawai-fungsional_manage')->name('pegawaiFungsionals.edit');
            });

            Route::prefix('pangkat')->group(function () {
                // Route::get('', PegawaiPangkatIndex::class)->middleware('can:pegawai-pangkat_access')->name('pegawaiPangkats.index');
                Route::get('/create', PegawaiPangkatCreate::class)->middleware('can:pegawai-pangkat_manage')->name('pegawaiPangkats.create');
                Route::get('/{pegawaiPangkat}/edit', PegawaiPangkatEdit::class)->middleware('can:pegawai-pangkat_manage')->name('pegawaiPangkats.edit');
            });

            Route::prefix('jabatan')->group(function () {
                // Route::get('', PegawaiJabatanIndex::class)->middleware('can:pegawai-jabatan_access')->name('pegawaiJabatans.index');
                Route::get('/create', PegawaiJabatanCreate::class)->middleware('can:pegawai-jabatan_manage')->name('pegawaiJabatans.create');
                Route::get('/{pegawaiJabatan}/edit', PegawaiJabatanEdit::class)->middleware('can:pegawai-jabatan_manage')->name('pegawaiJabatans.edit');
            });

            Route::prefix('mutasi')->group(function () {
                // Route::get('', PegawaiMutasiIndex::class)->middleware('can:mutasi_access')->name('pegawaiMutasis.index');
                Route::get('/create', PegawaiMutasiCreate::class)->middleware('can:mutasi_manage')->name('pegawaiMutasis.create');
                Route::get('/{mutasi}/edit', PegawaiMutasiEdit::class)->middleware('can:mutasi_manage')->name('pegawaiMutasis.edit');
            });
        });
    });
});
