<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 10:12
 */
namespace App\Http\Controllers;
class StatuscodeController
{

    private static $SUCCESS = 200;
    private static $SUCCESSCREATION = 201;
    private static $BAD_REQUEST = 400;
    private static $FORBIDEN_RESPONSE = 403;

    /**
     * @return int
     */
    public static function getSUCCESS ()
    {
        return self::$SUCCESS;
    }

    /**
     * @return int
     */
    public static function getSUCCESSCREATION ()
    {
        return self::$SUCCESSCREATION;
    }

    /**
     * @return int
     */
    public static function getBADREQUEST ()
    {
        return self::$BAD_REQUEST;
    }

    /**
     * @return int
     */
    public static function getFORBIDENRESPONSE ()
    {
        return self::$FORBIDEN_RESPONSE;
    }


}