<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    User\Profile as profile,
    Permission\Index as PermissionIndex,
    Permission\Create as PermissionCreate,
    Permission\Edit as PermissionEdit,
    Role\Index as RoleIndex,
    Role\Create as RoleCreate,
    Role\Edit as RoleEdit,
    Fungsional\Index as FungsionalIndex,
    Fungsional\Create as FungsionalCreate,
    Fungsional\Edit as FungsionalEdit,
    Unit\Index as UnitIndex,
    Unit\Create as UnitCreate,
    Unit\Edit as UnitEdit,
};

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('profile', Profile::class)->name('profile');

    Route::prefix('admin')->group(function () {
        Route::middleware(['can:roles_manage'])->group(function () {
            // roles
            Route::get('permissions/create', PermissionCreate::class)->name('permisssions.create');
            Route::get('permissions/{permission}/edit', PermissionEdit::class)->name('permisssions.edit');
    
            // permission
            Route::get('roles/create', RoleCreate::class)->name('roles.create');
            Route::get('roles/{role}/edit', RoleEdit::class)->name('roles.edit');
        });
    
        Route::middleware(['can:roles_access'])->group(function () {
            //roles
            Route::get('permissions', PermissionIndex::class)->name('permisssions.index');
            //permission
            Route::get('roles', RoleIndex::class)->name('roles.index');
        });

        Route::get('fungsionals', FungsionalIndex::class)->name('fungsionals.index');
        Route::get('fungsionals/create', FungsionalCreate::class)->name('fungsionals.create');
        Route::get('fungsionals/{fungsional}/edit', FungsionalEdit::class)->name('fungsionals.edit');

        Route::get('units', UnitIndex::class)->name('units.index');
        Route::get('units/create', UnitCreate::class)->name('units.create');
        Route::get('units/{unit}/edit', UnitEdit::class)->name('units.edit');
    });
    
});
