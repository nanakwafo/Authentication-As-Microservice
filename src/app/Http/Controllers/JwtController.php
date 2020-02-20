<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 23:34
 */


namespace App\Http\Controllers;

use App\Services\Statuscode;
use App\Services\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JwtController extends Controller
{
    private $statuscode;

    public function __construct (Statuscode $statuscode)
    {
        $this->statuscode = $statuscode;
    }

    private function respondWithToken ($token)
    {
        return response ()->json ([
            'token'      => $token,
            'token_type' => 'bearer',
            'expires_in' => 3600
        ], $this->statuscode->getSUCCESS());
    }

    public function tokenGenerate (Request $request, Response $response)
    {

        $this->validate ($request, [
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = $request->only (['email', 'password']);

        if ( !$token = Auth::attempt ($credentials) ) {
            return $response->getResponse('Token generation was unsuccessful',
                'Unauthorized',
                'failure',
                $this->statuscode->getSUCCESS());
        }

        return $response->getResponse( 'Token generated successfully',
            $this->respondWithToken ($token),
            'success',
            $this->statuscode->getSUCCESS ());

    }


}