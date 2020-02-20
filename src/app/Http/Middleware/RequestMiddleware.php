<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 15/02/2020
 * Time: 23:03
 */
namespace App\Http\Middleware;

use App\Services\Response;
use App\Services\Statuscode;
use Closure;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\StatuscodeController;

class RequestMiddleware
{




    public function handle ($request, Closure $next)
    {
        $statusCode= new Statuscode();
        $response = new Response();
        if($request->isMethod('post')){
            if ( $request->header ('Content-Type') != env ('APP_REQUEST_TYPE')) {

                return $response->getResponse("Invalid Request", $request, "success",$statusCode->getINVALIDREQUEST());

            }

        }
     
        return $next($request);
    }
}