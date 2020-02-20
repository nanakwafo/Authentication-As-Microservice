<?php
namespace App\Http\Controllers;


use App\Services\Statuscode;
use App\Services\Response;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class ActivationController extends Controller
{
    private $statuscode;

    public function __construct (Statuscode $statuscode)
    {
        $this->statuscode = $statuscode;
    }


    public function activateUser (Request $request, Response $response)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);
        $activation = Activation::create ($user);

        return $response->getResponse('User was successfully activated',$activation,'success', $this->statuscode->getSUCCESS());

    }

    public function activationExit (Request $request, Response $response)
    {
        $user = Sentinel::findByCredentials (['login' => $request->email]);

        $activationExit = Activation::exists ($user);

        return $response->getResponse(  'User was successfully activated', $activationExit,'success', $this->statuscode->getSUCCESS());
    }

    public function activationCompleted (Request $request, Response $response)
    {
        $user = Sentinel::findByEmail (['login' => $request->email]);

        $activation = Activation::completed ($user);

        return $response->getResponse( 'User activation is activated',$activation,'success',$this->statuscode->getSUCCESS());
    }

    public function deativate (Request $request, Response $response)
    {
        $user = Sentinel::findByEmail (['login' => $request->email]);

        $activation = Activation::remove ($user);

        return $response->getResponse('User was successfully deactivated',$activation,  'success',$this->statuscode->getSUCCESS());

    }

}