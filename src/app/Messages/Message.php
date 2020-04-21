<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 20/02/2020
 * Time: 14:47
 */
namespace App\Messages;

class Message
{
    private static $logInSuccess = 'User successfully logedin';
    private static $logInFailure = 'User logedin was Unsuccessful';
    private static $logOutsuccess = 'User succcessfully Logout';
    private static $tokenGenerationFailure = 'Token generation was unsuccessful';
    private static $tokenGenerationSuccess = 'Token generated successfully';
    private static $userCreationSuccessNoActivation = 'User was successfully created and require activation';
    private static $userCreationSuccessActivation = 'User was successfully created';
    private static $updateUserSuccess = 'User details successfully updated';
    private static $deleteUserSuccess = 'User successfully deleted';
    private static $userlistSuccess = 'User list';
    private static $finduserSuccess = 'User details';
    private static $activateUser = 'User was successfully activated';
    private static $activateExit = 'User is activated';
    private static $activateCompleted = 'User activation is completed';
    private static $deactivate = 'User was successfully deactivated';
    private static $invalidrequest = 'Request must be json';
    private static $usernotfound = 'User can not be found';
    private static $credentialsCreated = 'Credentials has been generated successfully';
    private static $rolefound = "Role Found";
    private static $rolecreated = "Role created successfully";
    private static $userassignedtorole = "User assigned to role successfully";
    private static $userremovedfromrole = "User removed from roles successfully";
    private static $remindercreated = "Reminder Created successfully";
    private static $reminderremoved = "Reminder Removed  successfully";
    private static $accountVerified = "User Account Verified";
    public static $accountNotVerified = "Verification Code do not match";
    public static $forgotpasswordmailSuccess = "Mail Sent";

    /**
     * @return string
     */
    public static function getLogInSuccess ()
    {
        return self::$logInSuccess;
    }

    /**
     * @return string
     */
    public static function getLogInFailure ()
    {
        return self::$logInFailure;
    }

    /**
     * @return string
     */
    public static function getLogOutsuccess ()
    {
        return self::$logOutsuccess;
    }

    /**
     * @return string
     */
    public static function getTokenGenerationFailure ()
    {
        return self::$tokenGenerationFailure;
    }

    /**
     * @return string
     */
    public static function getTokenGenerationSuccess ()
    {
        return self::$tokenGenerationSuccess;
    }

    /**
     * @return string
     */
    public static function getUserCreationSuccessNoActivation ()
    {
        return self::$userCreationSuccessNoActivation;
    }

    /**
     * @return string
     */
    public static function getUserCreationSuccessActivation ()
    {
        return self::$userCreationSuccessActivation;
    }

    /**
     * @return string
     */
    public static function getUpdateUserSuccess ()
    {
        return self::$updateUserSuccess;
    }

    /**
     * @return string
     */
    public static function getDeleteUserSuccess ()
    {
        return self::$deleteUserSuccess;
    }

    /**
     * @return string
     */
    public static function getUserlistSuccess ()
    {
        return self::$userlistSuccess;
    }

    /**
     * @return string
     */
    public static function getFinduserSuccess ()
    {
        return self::$finduserSuccess;
    }

    /**
     * @return string
     */
    public static function getActivateUser ()
    {
        return self::$activateUser;
    }

    /**
     * @return string
     */
    public static function getActivateExit ()
    {
        return self::$activateExit;
    }

    /**
     * @return string
     */
    public static function getActivateCompleted ()
    {
        return self::$activateCompleted;
    }

    /**
     * @return string
     */
    public static function getDeactivate ()
    {
        return self::$deactivate;
    }

    /**
     * @return string
     */
    public static function getInvalidrequest ()
    {
        return self::$invalidrequest;
    }

    /**
     * @return string
     */
    public static function getUsernotfound ()
    {
        return self::$usernotfound;
    }

    public function getCredentailCreated ()
    {
        return self::$credentialsCreated;
    }

    public function getRoleFound ()
    {
        return self::$rolefound;
    }

    public function getRoleCreated ()
    {
        return self::$rolecreated;
    }

    public function getUserAssignedToRole ()
    {
        return self::$userassignedtorole;
    }

    public function getUserRemovedFromRole ()
    {
        return self::$userremovedfromrole;
    }

    public function getReminderCreated ()
    {
        return self::$remindercreated;
    }

    public function getCompletePasswordReset ()
    {
        return self::$completepasswordreset;
    }

    public function getUnconpletedPasswordReset ()
    {
        return self::$uncompletepasswordreset;
    }

    public function getRemindersRemoved ()
    {
        return self::$reminderremoved;
    }


    public function getUserVerification ()
    {
        return self::$accountVerified;
    }

    public function getUserVerificationFail ()
    {
        return self::$accountNotVerified;
    }
    
    
    public function getForgotpasswordUser(){
        return self::$forgotpasswordmailSuccess;
    }


}