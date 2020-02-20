<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 20/02/2020
 * Time: 16:31
 */
namespace App\Services;
class Validationrule
{
    private static $email = 'required|string';
    private static $password = 'required|string';


    public function validateLoginRule ()
    {
        return [
            'email'    => self::$email,
            'password' => self::$password
        ];
    }

    public function validateLogoutRule ()
    {
        return [
            'email' => self::$email
        ];
    }

    public function validateActivationUserRule ()
    {
        return [
            'email' => self::$email
        ];
    }

    public function validateActivationExitRule ()
    {
        return [
            'email' => self::$email
        ];
    }

    public function validateActivationCompletedRule ()
    {
        return [
            'email' => self::$email
        ];
    }

    public function validateDeactivateRule ()
    {
        return [
            'email' => self::$email
        ];
    }


    public function validatecreateUserWithOutActivationRule ()
    {
        return [
            'email'    => self::$email,
            'password' => self::$password
        ];
    }

    public function validatecreateUserWithActivationRule ()
    {
        return [
            'email'    => self::$email,
            'password' => self::$password
        ];
    }

    public function validateupdateUserRule ()
    {
        return [
            'email' => self::$email
        ];
    }

    public function validatedeleteUserRule ()
    {
        return [
            'email' => self::$email
        ];
    }

    public function validatefindUserByEmailRule ()
    {
        return [
            'email' => self::$email
        ];
    }


}