<?php
 
namespace Ifgiovanni\LogVMiddlewareAuth\Middlewares;
use Ifgiovanni\LogVMiddlewareAuth\Traits\JwtTrait;

class LogVAuthRouteMiddleware
{

    use JwtTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        if(app()->environment('local')){
            $token = request()->cookie(config('logv-middleware-auth.LOG_VIEWER_COOKIE'));
            if(!isset($token) || !$this->is_jwt_valid($token)){
                return response()->json(['status' => 401, 'message' => "Unauthorized"]);
            }
            return $next($request);
        }

        return $next($request);
    }
 
}