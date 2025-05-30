<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/managerRent', function () {
    return Inertia::render('managerLk/ManagerRent');
})->name('managerRent');

Route::get('/managerReq', function () {
    return Inertia::render('managerLk/ManagerReq');
})->name('managerReq');

Route::get('/managerCreateAct', function () {
    return Inertia::render('managerLk/ManagerCreateAct');
})->name('managerCreateAct');

Route::get('/managerOrganisation', function () {
    return Inertia::render('managerLk/ManagerOrganisation');
})->name('managerOrganisation');

Route::get('/rentUnitDetail', function () {
    return Inertia::render('rentLk/RentUnitDetail');
})->name('rentUnitDetail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
