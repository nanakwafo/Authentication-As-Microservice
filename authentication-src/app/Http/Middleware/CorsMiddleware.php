<?php
namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if ($request->getMethod() === "OPTIONS") {
//            return response('');
//        }

        return $next($request)
            ->header('Access-Control-Allow-Origin','*')
//            ->header ('Access-Control-Expose-Headers','Content-Length, X-JSON')
            ->header('Access-Control-Allow-Headers','Origin, Content-Type, X-Auth-Token, Authorization,Accept')
            ->header('Access-Control-Allow-Methods','GET, POST, PATCH, PUT, DELETE, OPTIONS');
    }
}