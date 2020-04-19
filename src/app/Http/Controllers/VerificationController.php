<?php

namespace App\Http\Controllers;

use App\Accountverification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Messages\Message;
use App\Services\Response;
use App\Services\Statuscode;
use App\Services\Validationrule;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 19/04/2020
 * Time: 17:31
 */
class VerificationController extends Controller
{

    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');

    }


    public function verifycode (Request $request, Response $response)
    {

        $this->validate ($request, $this->validationrule->validateverifycode ());
        $validcode = $this->getAccountCode ($request);
        try {
            if ( $request->code == $validcode ) {
                $user = Sentinel::findByCredentials (['login' => $request->account]);
                $activation = Activation::create ($user);

                return $response->getResponse ($this->message->getUserVerification (), $activation, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
            }
            else {
                $user = Sentinel::findByCredentials (['login' => $request->account]);

                return $response->getResponse ($this->message->getUserVerificationFail (), $user, parent::$statusFailure, $this->statuscode->getSUCCESS ());
            }

        } catch (Exception $exception) {
            return $exception->getMessage ();
        } catch (QueryException $exception) {
            return $exception->getMessage ();
        }


    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function getAccountCode (Request $request)
    {
        return Accountverification::where ('account', $request->account)->pluck ('code')->first ();
    }

}