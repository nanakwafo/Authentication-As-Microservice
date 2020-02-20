<?php
namespace App\Http\Controllers;


use App\Services\Response;
use App\Services\Statuscode;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class RegistrationController extends Controller
{
   
    private $statuscode;

    public function __construct (Statuscode $statuscode)
    {
        $this->statuscode = $statuscode;
    }


    public function createUserWithOutActivation (Request $request, Response $response)
    {

        $this->validate ($request, ['email' => 'required|string', 'password' => 'required|string']);

        $user = Sentinel::register (['email' => $request->email, 'password' => $request->password,]);

        return $response->getResponse ('User was successfully created and require activation',$user,'success', $this->statuscode->getSUCCESSCREATION ());


    }


    public function createUserWithActivation (Request $request, Response $response)
    {

        $this->validate ($request, [
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);

        $user = Sentinel::registerAndActivate (['email'    => $request->email,'password' => $request->password]);

        return $response->getResponse('User was successfully created and require activation',$user,'success',$this->statuscode->getSUCCESSCREATION());


    }

 
    public function updateUser (Request $request, Response $response)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);
        $details = [
            'first_name' => $request->first_name,
            //other details
        ];

        $userdetails = Sentinel::update ($user, $details);

        return $response->getResponse('User details successfully updated',$userdetails, 'success', $this->statuscode->getSUCCESS ());


    }

   

    public function deleteUser (Request $request, Response $response)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);

        $user->delete ();

        return $response->getResponse( 'User successfully deleted',$user,'success', $this->statuscode->getSUCCESS());


    }

    public function showAllUsers (Response $response)
    {
        $users = Sentinel::getUserRepository ()->get ();

        return $response->getResponse( 'User list', $users,'success',$this->statuscode->getSUCCESS ());

    }


    public function findUserByEmail (Request $request, Response $response)
    {

        $user = Sentinel::findByCredentials (['login' => $request->email]);


        return $response->getResponse('User details', $user, 'success', $this->statuscode->getSUCCESS ());
    }


}