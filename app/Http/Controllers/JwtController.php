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
    private function respondWithToken ($token, StatuscodeController $statuscodeController)
    {
        return response ()->json ([
            'token'      => $token,
            'token_type' => 'bearer',
            'expires_in' => 3600
        ], $statuscodeController->getSUCCESS ());
    }

    public function tokenGenerate (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {

        $this->validate ($request, [
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = $request->only (['email', 'password']);

        if ( !$token = Auth::attempt ($credentials) ) {
            return response ()->json ($responseController->responseBody (
                'Token generation was unsuccessful',
                'Unauthorized',
                'failure',
                $statuscodeController->getBADREQUEST ()
            ));
        }

        return response ()->json ($responseController->responseBody (
            'Token generated successfully',
            $this->respondWithToken ($token, $statuscodeController),
            'success',
            $statuscodeController->getSUCCESS ()
        ));

    }


}