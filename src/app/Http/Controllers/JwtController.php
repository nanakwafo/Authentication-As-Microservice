<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 23:34
 */


namespace App\Http\Controllers;

use App\Messages\Message;
use App\Services\Statuscode;
use App\Services\Validationrule;
use App\Services\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JwtController extends Controller
{
    

    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
    }

    private function respondWithToken ($token)
    {
        return response ()->json ([
            'token'      => $token,
            'token_type' => 'bearer',
            'expires_in' => 3600
        ], $this->statuscode->getSUCCESS ());
    }

    public function tokenGenerate (Request $request, Response $response)
    {

        $this->validate ($request, $this->validationrule->validateLoginRule ());

        $credentials = $request->only (['email', 'password']);

        if ( !$token = Auth::attempt ($credentials) ) {
            return $response->getResponse ($this->message->getTokenGenerationFailure (),'Unauthorized', parent::$statusFailure, $this->statuscode->getUNAUTHORIZED ());
        }

        return $response->getResponse ($this->message->getTokenGenerationSuccess (), $this->respondWithToken ($token), parent::$statusSuccess, $this->statuscode->getSUCCESS ());

    }


}