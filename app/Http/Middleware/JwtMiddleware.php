<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 21:11
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class JwtMiddleware
{
    public function handle ($request, Closure $next)
    {

        $credentials = $request->only (['email', 'password']);


        if ( !$token = Auth::attempt ($credentials) ) {
            return response ()->json (['message' => 'Unauthorized']);
        }


        return $next($this->respondWithToken ($token));  //return jwt tokem
    }
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     