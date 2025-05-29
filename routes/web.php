<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('login');

});

Route::middleware('auth')->group(function () {
    Route::inertia('/', "Welcome")->name('welcomes');
});
