<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    Permission\Index as PermissionIndex,
    Permission\Create as PermissionCreate,
    Permission\Edit as PermissionEdit,
    Role\Index as RoleIndex,
    Role\Create as RoleCreate,
    Role\Edit as RoleEdit
};

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

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
    });

    
});
