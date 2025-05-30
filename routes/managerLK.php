<?php

$controllers = [
    \App\ManagerLk\Http\Controller\UserController::class,
];

//Route::group(['middleware' => 'auth'], function () use ($controllers) {
    foreach ($controllers as $controller) {
        Route::resource($controller::$route, $controller);
    }

//});
