<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class RegistrationController extends Controller
{


    public function __construct ()
    {
        //$this->middleware ('auth');
        $this->middleware ('token');

    }

    /*
     * create a user for an application without activation
    */
    public function createUserWithOutActivation (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {

        $this->validate ($request, [  //Validate request parameters
                                      'email'    => 'required|string',
                                      'password' => 'required|string'
        ]);

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];
        $user = Sentinel::register ($credentials);

        return response ()->json ($responseController->responseBody (
            'User was successfully created and require activation', 
            $user,
            'success',
            $statuscodeController::getSUCCESSCREATION ()

        ));


    }

    /*
     * create a user for an application with activation if the application involves activation of a user
    */
    public function createUserWithActivation (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {

        $this->validate ($request, [
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];
        $user = Sentinel::registerAndActivate ($credentials);

        return response ()->json ($responseController->responseBody (
            'User was successfully created and require activation',
            $user,
            'success',
            $statuscodeController::getSUCCESSCREATION ()

        ));


    }

    /*
     * update a user information for an application
     * 
    */
    public function updateUser (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);
        $details = [
            'first_name' => $request->first_name,
        ];

        $userdetails = Sentinel::update ($user, $details);

        return response ()->json ($responseController->responseBody (
            'User details successfully updated',
            $userdetails,
            'success',
            $statuscodeController::getSUCCESS ()

        ));


    }

    /*
     * create a user for an application 
    */

    public function deleteUser (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);

        $user->delete ();

        return response ()->json ($responseController->responseBody (
            'User successfully deleted',
            $user,
            'success',
            $statuscodeController::getSUCCESS ()
        ));


    }

    /*
     * Retrieve all user information for an application
    */
    public function showAllUsers (ResponseController $responseController, StatuscodeController $statuscodeController)
    {
        $users = Sentinel::getUserRepository ()->get ();

        return response ()->json ($responseController->responseBody (
            'User list',
            $users,
            'success',
            $statuscodeController::getSUCCESS()
        ));

    }

    /*
     * Retrieve a user by an id  from your application
    */

    public function findUserByEmail (Request $request, ResponseController $responseController, StatuscodeController $statuscodeController)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);


        return response ()->json ($responseController->responseBody (
            'User details',
            $user,
            'success',
            $statuscodeController::getSUCCESS ()
        ));
    }


}