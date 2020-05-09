<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 21/04/2020
 * Time: 22:31
 */

$router->group (['prefix' => 'api/v1'], function () use ($router) {

    $router->post ('User/forgotpasswordUser', ['uses' => 'ForgotpasswordController@sendMail']);


});
