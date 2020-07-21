<?php

namespace App;
use Cartalyst\Sentinel\Users\EloquentUser;

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 19/04/2020
 * Time: 15:33
 */

class SentinelUser extends EloquentUser {

    protected $fillable = [
        'email',
        'mobile',
        'password',
        'last_name',
        'first_name',
        'permissions',
    ];

    protected $loginNames = ['email', 'mobile'];

}