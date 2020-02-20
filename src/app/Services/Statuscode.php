<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 20/02/2020
 * Time: 01:01
 */
namespace  App\Services;
class Statuscode{
    
    private static $SUCCESS = 200;
    private static $SUCCESS_CREATION = 201;
    private static $BAD_REQUEST = 400;
    private static $FORBIDEN_RESPONSE = 403;

    /**
     * Statuscode constructor.
     */
    public function __construct ()
    {
    }

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
        return self::$SUCCESS_CREATION;
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
