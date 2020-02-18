<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 31/01/2020
 * Time: 21:49
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Native\Facades\Sentinel;


class AuthenticationController extends Controller
{


    public function __construct ()
    {
        $this->middleware ('token');
    }

    /*
     * Log in user
     * */
    /**
     * @param Request $request
     * @param ResponseController $responseController
     * @param StatuscodeController $statuscodeController
     * @return mixed
     */
    public function login (Request $request,
                           ResponseController $responseController, 
                           StatuscodeController $statuscodeController)
    {
        $this->validate ($request, [
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = $request->only (['email', 'password']);
        if ( Sentinel::authenticate ($credentials) ) {

            $loggedInUser = Sentinel::getUser ();

            return response ()->json ($responseController->responseBody ('User successfully logedin', $loggedInUser, 'success', $statuscodeController->getSUCCESS ()));

        }

        return response ()->json ('Invalid Credentials', parent::FORBIDEN_RESPONSE);
    }

    /*
     * Logout user from your aapplication
     * */
    public function logout (Request $request, 
                            ResponseController $responseController, 
                            StatuscodeController $statuscodeController)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);
        $logout = Sentinel::logout ($user);

        return response ()->json ($responseController->responseBody ('User successfully loggout', $logout, 'success', $statuscodeController::getSUCCESS ()));
    }
}