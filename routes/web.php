<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/backend.php';
