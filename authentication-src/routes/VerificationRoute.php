<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 19/04/2020
 * Time: 19:10
 */

$router->group (['prefix' => 'api/v1'], function () use ($router) {

    $router->post ('User/verify', ['uses' => 'VerificationController@verifycode']);


});

