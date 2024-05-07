<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('medical-devices', MedicalDeviceController::class);
    $router->resource('medical-device-types', MedicalDeviceTypeController::class);
    $router->resource('users', UserController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('order-details', OrderDetailController::class);
});
