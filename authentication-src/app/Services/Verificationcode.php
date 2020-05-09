<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 19/04/2020
 * Time: 17:16
 */
namespace App\Services;
class Verificationcode
{

    private $generator = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    private function generateConfirmationCode ()
    {
        return substr (str_shuffle ($this->generator), 0, 4);
    }

    public function getcode ()
    {
        return $this->generateConfirmationCode ();
    }

    public function getexpiry ()
    {
        return '2';
    }
}