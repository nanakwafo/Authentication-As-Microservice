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

class RequestMiddleware extends Middleware
{


    public function handle ($request, Closure $next)
    {

        if ( $request->isMethod ('post') ) {
            if ( $request->header ('Content-Type') != env ('APP_REQUEST_TYPE') ) {

                return $this->response->getResponse ($this->message->getInvalidrequest (), '', parent::$statusFailure, $this->statusCode->getINVALIDREQUEST ());

            }

        }

        return $next($request);
            

    }
}