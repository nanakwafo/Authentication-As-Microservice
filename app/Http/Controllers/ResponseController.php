<?php

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 15/02/2020
 * Time: 23:46
 */
namespace App\Http\Controllers;


class ResponseController
{
    private $message;
    private $data;
    private $status;
    private $statusCode;

    public function __construct ()
    {
        $this->message = 'Message';
        $this->data = 'Data';
        $this->status = 'status';
        $this->statusCode = 'StatusCode';
    }


    public function responseBody (string $message, string $data, string $status, int $statusCode):array
    {

        return [
            $this->message    => $message,
            $this->data       => $data,
            $this->status     => $status,
            $this->statusCode => $statusCode

        ];
    }
}