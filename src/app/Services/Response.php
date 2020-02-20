<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 20/02/2020
 * Time: 01:01
 */
namespace App\Services;

class Response
{

    private $message;
    private $data;
    private $status;
    private $statusCode;

    /**
     * @return mixed
     */
    public function getMessage ()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage ($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getData ()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData ($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getStatus ()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus ($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatusCode ()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode ($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * Response constructor.
     * @param $message
     * @param $data
     * @param $status
     * @param $statusCode
     */
    public function __construct ($message, $data, $status, $statusCode)
    {
        $this->message = $message;
        $this->data = $data;
        $this->status = $status;
        $this->statusCode = $statusCode;
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

    public function getResponse (string $message, string $data, string $status, int $statusCode)
    {
        return response ()->json ($this->responseBody ($message,$data,$status,$statusCode));
    }


}