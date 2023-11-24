<?php

namespace Ifgiovanni\LogVMiddlewareAuth\Controllers;

use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Ifgiovanni\LogVMiddlewareAuth\Traits\JwtTrait;

class LogVAuthRouteController extends Controller
{
    use JwtTrait;

    public function login()
    {
        return view('logv-middleware-auth::auth');
    }

    public function checkLogin()
    {
        $user = request('user');
        $password = request('password');

        if(empty(config('logv-middleware-auth.LOG_VIEWER_USER')) || empty(config('logv-middleware-auth.LOG_VIEWER_PASSWORD'))){
           // return redirect()->route('log-viewer::login')->with('error', 'No credentials found');
        }

        if ($user == config('logv-middleware-auth.LOG_VIEWER_USER') && $password == config('logv-middleware-auth.LOG_VIEWER_PASSWORD')) {
            $headers = ['alg' => 'HS256', 'typ' => 'JWT'];
            $payload = ['sub' => $user, 'exp' => (time() + config('logv-middleware-auth.LOG_VIEWER_AUTH_EXPIRATION'))];
            $jwt = $this->generate_jwt($headers, $payload);
            $cookie = cookie(config('logv-middleware-auth.LOG_VIEWER_COOKIE'), $jwt, config('logv-middleware-auth.LOG_VIEWER_AUTH_EXPIRATION'));

            return redirect()->route('log-viewer::dashboard')->cookie($cookie);

        } else {
            return redirect()->route('log-viewer::login')->with('error', 'Invalid credentials');
        }
    }
}
