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

    private $message = 'Message';
    private $data = 'Data';
    private $status = 'status';
    private $statusCode = 'StatusCode';


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


    public function getResponse (string $message, $data, string $status, int $statusCode)
    {
        $data = [
            $this->message    => $message,
            $this->data       => $data,
            $this->status     => $status,
            $this->statusCode => $statusCode

        ];

        return response ()->json ($data);
    }


}