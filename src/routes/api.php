<?php

use Illuminate\Support\Facades\Route;
use Ifgiovanni\LogVMiddlewareAuth\Controllers;

$appPrefix = $this->app['config']->get('log-viewer.route.attributes.prefix');
    
Route::prefix($appPrefix)->group(function () {
    Route::get('login', 'Ifgiovanni\LogVMiddlewareAuth\Controllers\LogVAuthRouteController@login')->name('log-viewer::login');
    Route::post('login', 'Ifgiovanni\LogVMiddlewareAuth\Controllers\LogVAuthRouteController@checkLogin');
});