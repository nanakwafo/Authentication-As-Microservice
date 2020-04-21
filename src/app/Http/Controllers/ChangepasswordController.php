<?php
namespace App\Http\Controllers;


use App\Messages\Message;
use App\Services\Statuscode;
use App\Services\Response;
use App\Services\Validationrule;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class ChangepasswordController extends Controller
{


    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');
    }


    public function changePasswordUser (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validatechangepasswordUserRule ());
        
        //acoount can be either email or mobile
        $user = Sentinel::findByCredentials (['login' => $request->account]);
        if ( is_null($user)) {
            return $response->getResponse ($this->message->getUsernotfound (), $user, parent::$statusFailure, $this->statuscode->getSUCCESS ());
        }
        //update password
        $newpassword = [
            'password' => $request->password,
        ];

        $user = Sentinel::update($user, $newpassword);

        return $response->getResponse ($this->message->getchangepasswordUser (), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());

    }



}