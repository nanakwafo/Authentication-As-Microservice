<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 12:02
 */


    $router->group (['prefix' => 'api/v1'], function () use ($router) {

        $router->get ('User', ['uses' => 'RegistrationController@showAllUsers']);

        $router->post ('User/createwithactivation', ['uses' => 'RegistrationController@createUserWithActivation']);

        $router->post ('User/createwithoutactivation', ['uses' => 'RegistrationController@createUserWithOutActivation']);

        $router->post ('User/delete', ['uses' => 'RegistrationController@deleteUser']);

        $router->post ('User/update', ['uses' => 'RegistrationController@updateUser']);

        $router->post ('User/finduser', ['uses' => 'RegistrationController@findUserByEmail']);


    });


