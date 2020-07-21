<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 21/04/2020
 * Time: 08:06
 */
namespace App\Http\Controllers;


use App\Messages\Message;
use App\Services\Statuscode;
use App\Services\Response;
use App\Services\Validationrule;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class ForgotpasswordController extends Controller
{


    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');
    }


    public function sendMail (Request $request, Response $response)
    {
       // $this->user = Sentinel::findByCredentials (['login' => $request->email]);validate ($request, $this->validationrule->validateActivationUserRule ());

        $forgotpassword =json_decode (file_get_contents ('http://3.91.94.89:8083/notification/email/forgotpasswordmail' . urlencode($request->email) ), true);

        if($forgotpassword)

            return $response->getResponse ($this->message->getForgotpasswordUser (), $forgotpassword, parent::$statusSuccess, $this->statuscode->getSUCCESS ());



    }


    }

