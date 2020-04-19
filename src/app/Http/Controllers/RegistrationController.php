<?php
namespace App\Http\Controllers;


use App\Accountverification;
use App\Exceptions\EmailduplicationException;
use App\Messages\Message;
use App\Services\Response;
use App\Services\Statuscode;
use App\Services\Validationrule;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Mockery\CountValidator\Exception;
use Verificationcode;


class RegistrationController extends Controller
{


    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');
   
    }

    //with email
    public function createUserWithOutActivation (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validatecreateUserWithOutActivationRule ());

        try {
            $user = Sentinel::register (['email' => $request->email, 'password' => $request->password,]);
            Accountverification::create(['account'=>$request->email, 'code'=>Verificationcode::getcode(), 'expiry'=>Verificationcode::getexpiry(), 'verified'=>'0']);
            //send email with verification code

        } catch (Exception $exception) {
            return $exception->getMessage ();
        } catch (QueryException $exception) {
            return $exception->getMessage ();
        }

        return $response->getResponse ($this->message->getUserCreationSuccessNoActivation (), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }
    //with mobile
    public function createUserWithOutActivationmobile (Request $request, Response $response)
    {
        //validate mobile number instead
        $this->validate ($request, $this->validationrule->validatecreateUserWithOutActivationRulemobile ());

        try {
            $user = Sentinel::register (['mobile' => $request->mobile, 'password' => $request->password,]);
            Accountverification::create(['account'=>$request->mobile, 'code'=>Verificationcode::getcode(), 'expiry'=>Verificationcode::getexpiry(), 'verified'=>'0']);
            //send text mesage with verification code
        } catch (Exception $exception) {
            return $exception->getMessage ();
        } catch (QueryException $exception) {
            return $exception->getMessage ();
        }

        return $response->getResponse ($this->message->getUserCreationSuccessNoActivation (), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }

    //with email
    public function createUserWithActivation (Request $request, Response $response)
    {

        $this->validate ($request, $this->validationrule->validatecreateUserWithActivationRule ());
        try {
            $user = Sentinel::registerAndActivate (['email' => $request->email, 'password' => $request->password]);
        } catch (Exception $exception) {
            return $exception->getMessage ();
        } catch (QueryException $exception) {
            return $exception->getMessage ();
        }


        return $response->getResponse ($this->message->getUserCreationSuccessActivation (), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }

    //with mobile
    public function createUserWithActivationmobile (Request $request, Response $response)
    {

        $this->validate ($request, $this->validationrule->validatecreateUserWithActivationRulemobile ());
        try {
            $user = Sentinel::registerAndActivate (['mobile' => $request->mobile, 'password' => $request->password]);
        } catch (Exception $exception) {
            return $exception->getMessage ();
        } catch (QueryException $exception) {
            return $exception->getMessage ();
        }


        return $response->getResponse ($this->message->getUserCreationSuccessActivation (), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }

    public function updateUser (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateupdateUserRule ());
        $user = Sentinel::findByCredentials (['login' => $request->email]);
        if ( is_null ($user) ) {
            return $response->getResponse ($this->message->getUsernotfound (), $user, parent::$statusFailure, $this->statuscode->getSUCCESS ());
        }
        try {
            $details = [
                'first_name' => $request->first_name,
                //other details
            ];

            $userdetails = Sentinel::update ($user, $details);
        } catch (\Exception $exception) {
            return $exception->getMessage ();
        }


        return $response->getResponse ($this->message->getUpdateUserSuccess (), $userdetails, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }


    public function deleteUser (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validatedeleteUserRule ());
        $user = Sentinel::findByCredentials (['login' => $request->email]);

        if ( is_null ($user) ) {
            return $response->getResponse ($this->message->getUsernotfound (), $user, parent::$statusFailure, $this->statuscode->getSUCCESS ());
        }

        $user->delete ();

        return $response->getResponse ($this->message->getDeleteUserSuccess (), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());


    }

    public function showAllUsers (Response $response)
    {
        try {
            $users = Sentinel::getUserRepository ()->get ();
        } catch (\Exception $exception) {
            return $exception->getMessage ();
        }


        return $response->getResponse ($this->message->getUserlistSuccess (), $users, parent::$statusSuccess, $this->statuscode->getSUCCESS ());

    }


    public function findUserByEmail (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validatefindUserByEmailRule ());

        try {
            $user = Sentinel::findByCredentials (['login' => $request->email]);
        } catch (\Exception $exception) {
            return $exception->getMessage ();
        }


        return $response->getResponse ($this->message->getFinduserSuccess (), $user, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
    }


}