<?php

$controllers = [
    \App\Http\Controllers\ManagerLk\UserController::class,
];

//Route::group(['middleware' => 'auth'], function () use ($controllers) {
    foreach ($controllers as $controller) {
        Route::resource($controller::$route, $controller);
    }

//});
