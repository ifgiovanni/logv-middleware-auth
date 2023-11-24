<?php

namespace Ifgiovanni\LogVMiddlewareAuth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LogVAuthRouteProvider extends ServiceProvider
{
    /**
     * Package name.
     *
     * @var string
     */
    protected $package = 'logv-middleware-auth';

    /**
     * 
     *
     * @return void
     */
    public function boot()
    {
        // 
        
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'logv-middleware-auth');
        $this->publishes([__DIR__.'/../config/config.php' => 
            config_path('logv-middleware-auth.php'),
        ], 'logv-middleware-auth-config');
    }

    /**
     * Registra los servicios ofrecidos por el proveedor.
     *
     * @return void
     */
    public function register()
    {
        // 
        $this->app->make('Ifgiovanni\LogVMiddlewareAuth\Controllers\LogVAuthRouteController');
        $this->app['router']->aliasMiddleware('log.viewer.auth', \Ifgiovanni\LogVMiddlewareAuth\Middlewares\LogVAuthRouteMiddleware::class);
        $this->mergeConfigFrom( __DIR__.'/../config/config.php', 'logv-middleware-auth');

    }
}
