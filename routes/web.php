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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/permissions', PermissionIndex::class)->name('permisssions.index');
    Route::get('/admin/permissions/create', PermissionCreate::class)->name('permisssions.create');
    Route::get('/admin/permissions/{permission}/edit', PermissionEdit::class)->name('permisssions.edit');

    Route::get('/admin/roles', RoleIndex::class)->name('roles.index');
    Route::get('/admin/roles/create', RoleCreate::class)->name('roles.create');
    Route::get('/admin/roles/{role}/edit', RoleEdit::class)->name('roles.edit');
});
