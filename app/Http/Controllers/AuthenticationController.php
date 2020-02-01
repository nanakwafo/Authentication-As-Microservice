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


class AuthenticationController extends Controller
{

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|string',
            'password'=>'required|string'
        ]); 
        $credentials= $request->only(['email','password']);

        if (!$token =Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorized'], 401);

        }
        return $this->respondWithToken($token);
    }

}