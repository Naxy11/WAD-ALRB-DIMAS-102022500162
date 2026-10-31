<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;

Route::get('/', function () {
    return redirect()->route('dokter.index');
});

Route::resource('dokter', DokterController::class);

