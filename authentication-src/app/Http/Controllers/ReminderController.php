<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 26/02/2020
 * Time: 21:22
 */

namespace App\Http\Controllers;

use App\Messages\Message;
use App\Services\Response;
use App\Services\Statuscode;
use App\Services\Validationrule;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;


class ReminderController extends controller
{
    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');
    }

    public function createUserReminder(Request $request,Response $response){
        $this->validate ($request, $this->validationrule->validatecreateUserReminder ());
        try{
            $user = Sentinel::findByCredentials (['login' => $request->email]);
           $reminder= Reminder::create($user);
            return $response->getResponse($this->message->getReminderCreated (), $reminder, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
        }catch(\Exception $exception){
              return $exception;
        }

    }

    //Check if a reminder record exists for the user.
    public  function checkIfReminderForIfUserExit(Request $request,Response $response){
        $this->validate ($request, $this->validationrule->checkIfReminderForIfUserExit ());

        try{
            $user = Sentinel::findByCredentials (['login' => $request->email]);

            $reminder= Reminder::exists($user);
            return $response->getResponse($this->message->getReminderCreated (), $reminder, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
        }catch (Exception $exception){
             return $exception->getMessage();
        }
    }
    public function reminderComplete(Request $request,Response $response){
        $this->validate ($request, $this->validationrule->checkreminderComplete ());
       //Attempt to complete the password reset for the user using the code passed and the new password.
        try{
            $user = Sentinel::findByCredentials (['login' => $request->email]);

            if ($reminder = Reminder::complete($user, $request->remindercode, $request->newpassword))
            {
                return $response->getResponse($this->message->getCompletePasswordReset (), $reminder, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
            }
            else
            {
                //reminder not found
                return $response->getResponse($this->message->getUnconpletedPasswordReset (), $reminder, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
            }
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }
    //Remove all expired reminders.
    public function  removeExpiredReminder(Response $response){

        $reminder= Reminder::removeExpired();
        return $response->getResponse($this->message->getRemindersRemoved(), $reminder, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
    }

}