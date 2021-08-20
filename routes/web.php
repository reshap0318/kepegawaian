<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect()->route('dashboard');
});

require __DIR__.'/backend.php';

require __DIR__.'/frontend.php';
