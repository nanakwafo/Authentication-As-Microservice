<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 21:11
 */
namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;


class JwtMiddleware extends Middleware
{

    public function handle ($request, Closure $next)
    {
        $token = JWTAuth::getToken ();
        Log::info ('Token sent by Application User', ['token' => $token]);
        try {
            $credentials = JWTAuth::getPayload ($token)->toArray ();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response ()->json (['token_expired'], $this->statusCode->getSERVERERROR ());

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response ()->json (['token_invalid'], $this->statusCode->getSERVERERROR ());

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response ()->json (['token_absent' => $e->getMessage ()], $this->statusCode->getSERVERERROR ());

        }
        Log::info ('Application user decoded token ', ['credentials' => $credentials]);
        $user = User::find($credentials['sub']);
        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;

        return $next($request);
    }
}