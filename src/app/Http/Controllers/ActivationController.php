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
    private $statuscode;
    private $message;
    private $validationrule;

    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
    }


    public function activateUser (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateActivationUserRule ());
        $user = Sentinel::findByCredentials (['login' => $request->email]);
        $activation = Activation::create ($user);

        return $response->getResponse ($this->message->getActivateUser (), $activation, parent::$statusSuccess, $this->statuscode->getSUCCESS ());

    }

    public function activationExit (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateActivationExitRule());
        $user = Sentinel::findByCredentials (['login' => $request->email]);

        $activationExit = Activation::exists ($user);

        return $response->getResponse ($this->message->getActivateExit (), $activationExit, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
    }

    public function activationCompleted (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateActivationCompletedRule());
        $user = Sentinel::findByEmail (['login' => $request->email]);

        $activation = Activation::completed ($user);

        return $response->getResponse ($this->message->getActivateCompleted (), $activation, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
    }

    public function deativate (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateDeactivateRule());
        $user = Sentinel::findByEmail (['login' => $request->email]);

        $activation = Activation::remove ($user);

        return $response->getResponse ($this->message->getDeactivate (), $activation, parent::$statusSuccess, $this->statuscode->getSUCCESS ());

    }

}