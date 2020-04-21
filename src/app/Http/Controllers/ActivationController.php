<?php
namespace App\Http\Controllers;


use App\Messages\Message;
use App\Services\Statuscode;
use App\Services\Response;
use App\Services\Validationrule;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class ActivationController extends Controller
{


    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');
    }


    public function activateUser (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateActivationUserRule ());
        $user = Sentinel::findByCredentials (['login' => $request->email]);
        if ( is_null($user)) {
            return $response->getResponse ($this->message->getUsernotfound (), $user, parent::$statusFailure, $this->statuscode->getSUCCESS ());
        }
        $activation = Activation::create ($user);

        return $response->getResponse ($this->message->getActivateUser (), $activation, parent::$statusSuccess, $this->statuscode->getSUCCESS ());

    }

    public function activationExit (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateActivationExitRule ());

        $user = Sentinel::findByCredentials (['login' => $request->email]);
        if ( is_null($user)) {
            return $response->getResponse ($this->message->getUsernotfound (), $user, parent::$statusFailure, $this->statuscode->getSUCCESS ());
        }

        $activationExit = Activation::exists ($user);

        return $response->getResponse ($this->message->getActivateExit (), $activationExit, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
    }

    public function activationCompleted (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateActivationCompletedRule ());
        $user = Sentinel::findByCredentials (['login' => $request->email]);
        if ( is_null($user)) {
            return $response->getResponse ($this->message->getUsernotfound (), $user, parent::$statusFailure, $this->statuscode->getSUCCESS ());
        }
        $activation = Activation::completed ($user);

        return $response->getResponse ($this->message->getActivateCompleted (), $activation, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
    }

    public function deactivate (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateDeactivateRule ());
        $user = Sentinel::findByCredentials (['login' => $request->email]);
        if ( is_null($user) ) {
            return $response->getResponse ($this->message->getUsernotfound (), $user, parent::$statusFailure, $this->statuscode->getSUCCESS ());
        }
        $activation = Activation::remove ($user);

        return $response->getResponse ($this->message->getDeactivate (), $activation, parent::$statusSuccess, $this->statuscode->getSUCCESS ());

    }

    public function completeActivation(Request $request, Response $response){


//        $this->validate ($request, $this->validationrule->validateDeactivateRule ());
//        $user = Sentinel::findById(1);
//
//        if (Activation::complete($user, 'activation_code_here'))
//        {
//            // Activation was successfull
//        }
//        else
//        {
//            // Activation not found or not completed.
//        }
    }

}