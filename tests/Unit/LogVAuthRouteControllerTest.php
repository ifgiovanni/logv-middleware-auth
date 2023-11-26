<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Ifgiovanni\LogVMiddlewareAuth\Controllers\LogVAuthRouteController;

class LogVAuthRouteControllerTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return ['Ifgiovanni\LogVMiddlewareAuth\Providers\LogVAuthRouteProvider'];
    }

    protected function setUp(): void
    {
        parent::setUp();
        Config::set('logv-middleware-auth.LOG_VIEWER_USER', 'testuser');
        Config::set('logv-middleware-auth.LOG_VIEWER_PASSWORD', 'testpassword');
        Config::set('logv-middleware-auth.LOG_VIEWER_AUTH_EXPIRATION', 60);
        Config::set('logv-middleware-auth.LOG_VIEWER_COOKIE', 'test_cookie');
    }

    public function testLoginView()
    {
        $response = $this->get(route('log-viewer::login'));

        $response->assertStatus(200);
        $response->assertViewIs('logv-middleware-auth::auth');
    }

    public function testCheckLoginWithInvalidCredentials()
    {
        $response = $this->post(route('log-viewer::login'), [
            'user' => 'invaliduser',
            'password' => 'invalidpassword',
        ]);

        $response->assertRedirect(route('log-viewer::login'));
        $response->assertSessionHas('error', 'Invalid credentials');
    }
}
