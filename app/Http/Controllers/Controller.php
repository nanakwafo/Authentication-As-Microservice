<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Laravel\Lumen\Http\Request;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
  const SUCCESSRESPONSE  = 200;
  const SUCCESSCREATION  = 201;
  const BAD_REQUEST=400;
  
  protected static $requestType='application/json';
  
  protected function validateJsonRequest(Request $request):bool{
    return $request->header('Content-Type')== self::$requestType ? true:false;
  
  }

  //Add this method to the Controller class
  protected function respondWithToken($token)
  {
    return response()->json([
        'token' => $token,
        'token_type' => 'bearer',
        'expires_in' =>  3600
    ], 200);
  }
}