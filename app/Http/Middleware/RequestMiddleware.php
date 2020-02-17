<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 15/02/2020
 * Time: 23:03
 */
namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\StatuscodeController;

class RequestMiddleware
{


    public function handle ($request, Closure $next)
    {
        $responseController = new ResponseController();
        $statusCode = new StatuscodeController();

        if ( $request->header ('Content-Type') != env ('APP_REQUEST_TYPE') ) {
            return response ()
                ->json ($responseController->responseBody ("Invalid Request", $request, "success", $statusCode::getBADREQUEST ()));
        }

        return $next($request);
    }
}