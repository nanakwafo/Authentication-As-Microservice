<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 26/02/2020
 * Time: 21:22
 */
class ReminderController extends controller
{
    public function __construct (Statuscode $statuscode, Message $message, Validationrule $validationrule)
    {
        $this->statuscode = $statuscode;
        $this->message = $message;
        $this->validationrule = $validationrule;
        $this->middleware ('token');
    }
}