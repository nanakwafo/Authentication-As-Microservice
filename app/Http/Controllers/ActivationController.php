<?php
namespace App\Http\Controllers;


use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class ActivationController extends Controller
{

    public function __construct ()
    {
        $this->middleware ('auth');
    }


    public function activateUser (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);
        $activation = Activation::create ($user);

        return response ()->json ($responseController->responseBody (
            'User was successfully activated',
            $activation,
            'success',
            $statuscodeController::getSUCCESSCREATION ()

        ));

    }

    public function activationExit (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {
        $user = Sentinel::findByCredentials ($request->email);

        $activationExit = Activation::exists ($user);

        return response ()->json ($responseController->responseBody (
            'User was successfully activated',
            $activationExit,
            'success',
            $statuscodeController::getSUCCESSCREATION ()

        ));
    }

    public function activationCompleted (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {
        $user = Sentinel::findByEmail (['login' => $request->email]);

        $activation = Activation::completed ($user);

        return response ()->json ($responseController->responseBody (
            'User activation is activated',
            $activation,
            'success',
            $statuscodeController::getSUCCESSCREATION ()

        ));
    }

    public function deativate (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {
        $user = Sentinel::findByEmail (['login' => $request->email]);

        $activation = Activation::remove ($user);

        return response ()->json ($responseController->responseBody (
            'User was successfully deactivated',
            $activation,
            'success',
            $statuscodeController::getSUCCESSCREATION ()

        ));

    }

}