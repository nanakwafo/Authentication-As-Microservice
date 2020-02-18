<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 23:34
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JwtController extends Controller
{

     public function token (Request $request)
    {
        //Validate request
        $this->validate ($request, [
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = $request->only (['email', 'password']);
        // Authenticate credentials using sentinel
//        if ( Sentinel::authenticate ($credentials) ) {
        //generate jwt token
        if ( !$token = Auth::attempt ($credentials) ) {
            return response ()->json (['message' => 'Unauthorized']);
        }
//        }
//        else {
//            return response ()->json ('Invalid Credentials', parent::FORBIDEN_RESPONSE);
//        }

        return $this->respondWithToken ($token);  //return jwt tokem
    }

}