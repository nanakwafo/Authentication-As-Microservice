<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 31/01/2020
 * Time: 21:49
 */

namespace App\Http\Controllers;
use Sentinel;


class AuthenticationController extends Controller
{

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        $credentials= $request->only(['email','password']);

        if (!$token =Sentinel::authenticate($credentials)){
            return response()->json(['message' => 'Unauthorized'], 401);

        }
        return $this->respondWithToken($token);
    }

}