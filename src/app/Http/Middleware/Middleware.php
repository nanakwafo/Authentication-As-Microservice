<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 21/02/2020
 * Time: 00:25
 */
namespace App\Http\Middleware;

use App\Services\Statuscode;
use App\Services\Response;
use App\Messages\Message;

class Middleware
{
    protected $statusCode;
    protected $response;
    protected $message;
    protected static $statusSuccess = 'success';
    protected static $statusFailure = 'failure';

    public function __construct (Statuscode $statusCode, Response $response, Message $message)
    {
        $this->statusCode = $statusCode;
        $this->response = $response;
        $this->message = $message;
    }
}