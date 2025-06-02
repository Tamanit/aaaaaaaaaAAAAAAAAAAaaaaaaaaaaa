<?php

use App\ManagerLk\Http\Controller\OrganizationController;
use App\ManagerLk\Http\Controller\PriceListController;
use App\ManagerLk\Http\Controller\RentUnitController;
use App\ManagerLk\Http\Controller\RentUnitTypeController;
use App\ManagerLk\Http\Controller\TariffController;
use App\ManagerLk\Http\Controller\UserController;
use App\RentLk\Http\Controller\BookingController;
use App\RentLk\ViewConfigFactory\TariffViewConfigFactory;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});
//
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::get('/managerRent', function () {
//    return Inertia::render('managerLk/ManagerRent');
//})->name('managerRent');
//
//Route::get('/managerReq', function () {
//    return Inertia::render('managerLk/ManagerReq');
//})->name('managerReq');
//
//Route::get('/managerCreateAct', function () {
//    return Inertia::render('managerLk/ManagerCreateAct');
//})->name('managerCreateAct');
//
//Route::get('/managerOrganisation', function () {
//    return Inertia::render('managerLk/ManagerOrganisation');
//})->name('managerOrganisation');
//
//Route::get('/rentUnitDetail', function () {
//    return Inertia::render('rentLk/RentUnitDetail');
//})->name('rentUnitDetail');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';
//require __DIR__.'/managerLK.php';

Route::inertia('/', 'managerLk/Dashboard');

Route::inertia('/lk', 'rentLk/Dashboard');


//$controllers = [

//];

$controllers = [
    \App\RentLk\Http\Controller\RentUnitTypeController::class,
    UserController::class,
    OrganizationController::class,
    RentUnitTypeController::class,
    RentUnitController::class,
    PriceListController::class,
    TariffController::class,
    BookingController::class
];

//Route::group(['middleware' => 'auth'], function () use ($controllers) {
foreach ($controllers as $controller) {
    Route::resource($controller::$route, $controller);
}

Route::get('test', function () {
    dd(
       str_replace('\\', '?', \App\Models\User::class)
    );
});

//});
