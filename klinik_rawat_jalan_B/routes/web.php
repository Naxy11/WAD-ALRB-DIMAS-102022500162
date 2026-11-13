<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('dokter.index');
});

Route::resource('dokter', DokterController::class);

Route::get('/login-user', function () {
    $user = User::firstOrCreate(
        ['email' => 'user@example.com'],
        ['name' => 'User Biasa', 'password' => 'password123', 'role' => 'user']
    );

    Auth::login($user);
    return redirect('/dokter');
});

Route::get('/login-admin', function() {
    $admin = User::where('role', 'admin')->first();

    if ($admin) {
        Illuminate\Support\Facades\Auth::login($admin);
        return redirect('/dokter');
    }

    return 'User admin tidak ditemukan.';
});