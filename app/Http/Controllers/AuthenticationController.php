<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 31/01/2020
 * Time: 21:49
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Sentinel\Native\Facades\Sentinel;


class AuthenticationController extends Controller
{

    
    public function __construct ()
    {
    }

    public function login (Request $request)
    {
        //Validate request
        $this->validate ($request, [
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = $request->only (['email', 'password']);
        // Authenticate credentials using sentinel
        if ( Sentinel::authenticate ($credentials) ) {
            //generate jwt token
            if ( !$token = Auth::attempt ($credentials) ) { 
                return response ()->json (['message' => 'Unauthorized'], parent::FORBIDEN_RESPONSE);
            }
        } else {
            return response ()->json ('Invalid Credentials', parent::FORBIDEN_RESPONSE);
        }

        return $this->respondWithToken ($token);  //return jwt tokem
    }

    /*
     *
     * */
    public function logout ()
    {
        //logout the corrent logedin user
        $logout = Sentinel::logout ();

        return response ()->json ($logout);
    }

}