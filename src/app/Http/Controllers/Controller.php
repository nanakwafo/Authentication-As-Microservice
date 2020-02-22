<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Laravel\Lumen\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    protected $statuscode;
    protected $message;
    protected $validationrule;
    protected static $statusSuccess = 'success';
    protected static $statusFailure = 'failure';

    /**
     * Controller constructor.
     */
  
}