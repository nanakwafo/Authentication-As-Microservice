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

//definition of class
class AuthenticationController extends Controller
{


    /**
     * AuthenticationController constructor.
     */
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        //Validate request
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = $request->only(['email', 'password']);
        if (Sentinel::authenticate($credentials)) { // Authenticate credentials using sentinel
            if (!$token = Auth::attempt($credentials)) { //generate jwt token
                return response()->json(['message' => 'Unauthorized'], parent::FORBIDEN_RESPONSE);
            }
        } else {
            return response()->json('Invalid Credentials', parent::FORBIDEN_RESPONSE);
        }
        return $this->respondWithToken($token);  //return jwt tokem
    }

    /*
     *
     * */
    public function logout()
    {
        //logout the corrent logedin user
        $logout = Sentinel::logout();
        return response()->json($logout);
    }

}