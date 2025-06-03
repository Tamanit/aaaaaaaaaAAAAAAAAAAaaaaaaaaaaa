<?php

use App\Enumeration\UserRole;
use App\Http\Middleware\RoleMiddleware;
use App\Http\ViewConfigFactories\TenantLk\BookingViewConfigFactory;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
//require __DIR__.'/managerLK.php';

$managerControllers = [
    \App\Http\Controllers\ManagerLk\UserController::class,
    \App\Http\Controllers\ManagerLk\OrganizationController::class,
    \App\Http\Controllers\ManagerLk\RentUnitTypeController::class,
    \App\Http\Controllers\ManagerLk\RentUnitController::class,
    \App\Http\Controllers\ManagerLk\PriceListController::class,
    \App\Http\Controllers\ManagerLk\TariffController::class,
    \App\Http\Controllers\ManagerLk\RoomInventoryController::class,
    \App\Http\Controllers\ManagerLk\RoomController::class,
];

$tenantControllers = [
    \App\Http\Controllers\TenantLk\RentUnitTypeController::class,
    \App\Http\Controllers\TenantLk\BookingController::class
];

$managerRoles = [
    UserRole::Administrator->value,
    UserRole::Worker->value
];

$tenantRoles = [
    UserRole::TenantOrganizationAdministrator->value,
    UserRole::TenantRentOrganizationWorker->value,
];


Route::get('/', function () use ($tenantRoles, $managerRoles) {
    if (!Auth::check()) {
        return redirect('/login', 301);
    }

    if (in_array(Auth::user()->role->value, $managerRoles)) {
        return redirect('/manager', 301);
    }

    if (in_array(Auth::user()->role->value, $tenantRoles)) {
        return redirect('/tenant', 301);
    }

    return redirect('/login', 301);
})->name('fuckingNullPoint');

Route::group(['middleware' => 'auth'],
    function () use ($managerControllers, $tenantControllers, $tenantRoles, $managerRoles) {
        Route::middleware(RoleMiddleware::class . ':' . implode(',', $managerRoles))->group(
            function () use ($managerControllers) {
                Route::prefix('manager')->group(function () use ($managerControllers) {
                    foreach ($managerControllers as $controller) {
                        Route::resource($controller::$route, $controller);
                        // костыль, для возможности отправки файлов при обновлении
                        Route::post($controller::$route . '/update', [$controller, 'update']);
                    }




                    Route::inertia('/', 'managerLk/Dashboard');
                });
            }
        );

        Route::middleware(RoleMiddleware::class . ':' . implode(',', $tenantRoles))->group(
            function () use ($tenantControllers) {
                Route::prefix('tenant')->group(function () use ($tenantControllers) {
                    foreach ($tenantControllers as $controller) {
                        Route::resource($controller::$route, $controller);
                    }

                    Route::post('/booking/search', [\App\Http\Controllers\TenantLk\BookingController::class, 'search'])->name('booking.search');
                    Route::get('/booking/createForm', [\App\Http\Controllers\TenantLk\BookingController::class, 'createBooking'])->name('booking.createForm');
                    Route::post('booking/createBooking', [\App\Http\Controllers\TenantLk\BookingController::class, 'storeBooking'])->name('booking.storeBooking');
                    Route::inertia('/', 'rentLk/Dashboard');
                });
            }
        );
    });

Route::get('test', function () use ($managerRoles, $tenantControllers) {
    $x = app(BookingViewConfigFactory::class)->fill();

    $y = app(\App\Service\RestService::class)->setModel(\App\Models\User::class);

    dd(
        $y->getPagination($x->indexMeta)
    );
});
