<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Laravel\Lumen\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{


    /**
     * Controller constructor.
     */
    public function __construct ()
    {
        $this->middleware ('token');
    }
}