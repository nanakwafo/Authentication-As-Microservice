<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 26/02/2020
 * Time: 19:16
 */

namespace App\Http\Controllers;

use App\Services\Response;
use Illuminate\Http\Request;
use App\Services\Statuscode;
use App\Messages\Message;
use App\Services\Validationrule;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Mockery\CountValidator\Exception;


class RoleController extends controller
{

    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');
    }

    public function getRoleBySlug (Request $request,Response $response)
    {
        $this->validate($request,$this->validationrule->validateRoleBySlug());
        try{
            $role= Sentinel::findRoleBySlug($request->rolename);
            return $response->getResponse($this->message->getRoleFound (), $role, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }



    public function createRole (Request $request, Response $response)
    {
        $this->validate ($request, $this->validationrule->validateCreateRole ());
        try {
            $role = Sentinel::getRoleRepository ()->createModel ()->create ([
                'name' => $request->name,
                'slug' => $request->slug
            ]);

            return $response->getResponse ($this->message->getRoleCreated (), $role, parent::$statusSuccess, $this->statuscode->getSUCCESS ());

        } catch (\Exception $exception) {
            return $exception->getMessage ();
        }
    }

    public function assignUserToRole (Request $request,Response $response)
    {
        $this->validate ($request, $this->validationrule->validateAssignUsertoRole ());
        try{
            $user = Sentinel::findByCredentials (['login' => $request->email]);
            $role =Sentinel::findRoleByName($request->rolename);
            $role->user()->attach($user);
            return $response->getResponse($this->message->getUserAssignedToRole (), $role, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
        }catch (\Exception $exception){
             return $exception->getMessage();
        }

    }

    public function removeUserFromRole (Request $request,Response $response)
    {
        $this->validate($request,$this->validationrule->validateRemoveUserFromRole());
        try{
            $user = Sentinel::findByCredentials (['login' => $request->email]);
            $role =Sentinel::findRoleByName($request->rolename);
            $role->users()->detach($user);
            return $response->getResponse($this->message->getUserRemovedFromRole (), $role, parent::$statusSuccess, $this->statuscode->getSUCCESS ());
        }catch (Exception $exception){
            return $exception->getMessage();

        }

    }
}