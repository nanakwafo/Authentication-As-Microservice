<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 10:38
 */

namespace App\Http\Controllers;

use App\User;
use App\Messages\Message;
use App\Services\Statuscode;
use App\Services\Response;
use Faker\Generator as Faker;
use Mockery\CountValidator\Exception;

class CredentialController extends Controller
{


    public function __construct (Statuscode $statuscode, Message $message)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;


    }


    public function getCredential (Faker $faker, Response $response)
    {

        try {
            $fakeUser = User::Credential ($faker);
            $newUser = new User([
                "email"    => $fakeUser['email'],
                "password" => $fakeUser['password_hashed']
            ]);
            $newUser->save ();

            return $response->getResponse ($this->message->getCredentailCreated (), [
                "Credentials" => [
                    "email"    => $fakeUser['email'],
                    "password" => $fakeUser['password']
                ]
            ], parent::$statusSuccess, $this->statuscode->getSUCCESS ());

            return $fakeUser;
        } catch (Exception $exception) {
            return $exception->getMessage ();
        }

    }
}