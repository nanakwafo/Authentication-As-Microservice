<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 31/01/2020
 * Time: 21:49
 */

namespace App\Http\Controllers;

use App\Services\Response;
use App\Services\Statuscode;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Native\Facades\Sentinel;


class AuthenticationController extends Controller
{
    private $statuscode;
    private $user;

    public function __construct (Statuscode $statuscode)
    {
        $this->statuscode = $statuscode;
       
    }


    public function logIn (Request $request, Response $response)
    {
        $this->validate ($request, [
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);

        return Sentinel::authenticate ($request->only (['email', 'password'])) ?
            $response->getResponse ('User successfully logedin', $this->user, 'success', $this->statuscode->getSUCCESS ()) :
            $response->getResponse ('Invalid Response', '', '', $this->statuscode->getSUCCESS ());
    }


    public function logOut (Request $request, Response $response)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);
        $logout = Sentinel::logout ($user);

        return response ()->json ($response->responseBody ('User successfully loggout', $logout, 'success', $this->statuscode->getSUCCESS ()));
    }
}