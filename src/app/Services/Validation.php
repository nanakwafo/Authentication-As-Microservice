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
    private static $account = 'required|string';
    private static $code = 'required|string';
    private static $mobile = 'required|string';
    private static $password = 'required|string';
    private static $name = 'required|string';
    private static $slug = 'required|string';
    private static $remindercode = 'required|string';
    private static $newpassword = 'required|string';


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

    public function validateCreateRole ()
    {
        return [
            'name' => self::$name,
            'slug' => self::$slug
        ];
    }

    public function validateRemoveUserFromRole ()
    {
        return [
            'email'    => self::$email,
            'rolename' => self::$rolename
        ];
    }

    public function validateAssignUsertoRole ()
    {
        return [
            'email'    => self::$email,
            'rolename' => self::$rolename
        ];
    }

    public function validateRoleBySlug ()
    {
        return [

            'rolename' => self::$rolename
        ];
    }

    public function validatecreateUserReminder ()
    {
        return [
            'email' => self::$email
        ];
    }

    public function checkIfReminderForIfUserExit ()
    {
        return [
            'email' => self::$email
        ];
    }

    public function checkreminderComplete ()
    {
        return [
            'email'        => self::$email,
            'remindercode' => self::$remindercode,
            'newpassword'  => self::$newpassword

        ];
    }

    public function validatecreateUserWithOutActivationRulemobile ()
    {
        return [
            'mobile'   => self::$mobile,
            'password' => self::$password
        ];
    }

    public function validatecreateUserWithActivationRulemobile ()
    {
        return [
            'mobile'   => self::$mobile,
            'password' => self::$password
        ];
    }
    
    public function validateverifycode(){
        return [
            'account'   => self::$account,
            'code' => self::$code
        ];
    }
}