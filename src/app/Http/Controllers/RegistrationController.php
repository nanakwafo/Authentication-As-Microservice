<?php
namespace App\Http\Controllers;


use App\Messages\Message;
use App\Services\Response;
use App\Services\Statuscode;
use App\Services\Validationrule;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class RegistrationController extends Controller
{

    private $statuscode;
    private $message;
    private $validationrule;
    
    public function __construct (Statuscode $statuscode, Message $message,Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule=$validationrule;
    }


    public function createUserWithOutActivation (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validatecreateUserWithOutActivationRule());
        

        $user = Sentinel::register (['email' => $request->email, 'password' => $request->password,]);

        return $response->getResponse ($this->message->getUserCreationSuccessNoActivation(), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }


    public function createUserWithActivation (Request $request, Response $response)
    {

        $this->validate ($request, $this->validationrule->validatecreateUserWithActivationRule());

        $user = Sentinel::registerAndActivate (['email' => $request->email, 'password' => $request->password]);

        return $response->getResponse ($this->message->getUserCreationSuccessActivation(), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }


    public function updateUser (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateupdateUserRule());
        $user = Sentinel::findByCredentials (['login' => $request->email]);
        $details = [
            'first_name' => $request->first_name,
            //other details
        ];

        $userdetails = Sentinel::update ($user, $details);

        return $response->getResponse ($this->message->getUpdateUserSuccess(), $userdetails, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }


    public function deleteUser (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validatedeleteUserRule());
        $user = Sentinel::findByCredentials (['login' => $request->email]);

        $user->delete ();

        return $response->getResponse ($this->message->getDeleteUserSuccess(), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }

    public function showAllUsers (Response $response)
    {
        
        $users = Sentinel::getUserRepository ()->get ();

        return $response->getResponse ($this->message->getUserlistSuccess(), $users, parent::$statusSuccess, $this->statuscode->getSUCCESS ());

    }


    public function findUserByEmail (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validatefindUserByEmailRule());
        $user = Sentinel::findByCredentials (['login' => $request->email]);


        return $response->getResponse ($this->message->getFinduserSuccess(), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
    }


}