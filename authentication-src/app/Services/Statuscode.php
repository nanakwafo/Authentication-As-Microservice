<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 20/02/2020
 * Time: 01:01
 */
namespace App\Services;
class Statuscode
{

    private static $SUCCESS = 200;
    private static $INVALID_REQUEST = 400;
    private static $UNAUTHORIZED = 401;
    private static $FORBIDEN_RESPONSE = 403;
    private static $SERVER_ERROR = 500;

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
    public static function getINVALIDREQUEST ()
    {
        return self::$INVALID_REQUEST;
    }

    /**
     * @return int
     */
    public static function getUNAUTHORIZED ()
    {
        return self::$UNAUTHORIZED;
    }

    /**
     * @return int
     */
    public static function getFORBIDENRESPONSE ()
    {
        return self::$FORBIDEN_RESPONSE;
    }

    /**
     * @return int
     */
    public static function getSERVERERROR ()
    {
        return self::$SERVER_ERROR;
    }

    
}
