<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 31/01/2020
 * Time: 21:49
 */

namespace App\Http\Controllers;

use App\Messages\Message;
use App\Services\Response;
use App\Services\Statuscode;
use App\Services\Validationrule;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Native\Facades\Sentinel;


class AuthenticationController extends Controller
{

    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');
    }


    public function logIn (Request $request, Response $response)
    {
       $this->validate ($request, $this->validationrule->validateLoginRule ());

        return Sentinel::authenticate ($request->only (['email', 'password']))
            ?
            $response->getResponse ($this->message->getLogInSuccess (),Sentinel::getUser(), 'success', $this->statuscode->getSUCCESS ())
            :
            $response->getResponse ($this->message->getLogInFailure (), '', '', $this->statuscode->getUNAUTHORIZED ());
    }


    public function logOut (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateLogoutRule ());
        $user = Sentinel::findByCredentials (['login' => $request->email]);
        if ( !$user instanceof EloquentUser ) {
            return $response->getResponse ($this->message->getUsernotfound (), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
        }
        $logout = Sentinel::logout ($user);

        return response ()->json ($response->responseBody ($this->message->getLogOutsuccess (), $logout, 'success', $this->statuscode->getSUCCESS ()));
    }
}