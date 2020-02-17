<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 12:02
 */
$router->group (['prefix' => 'api'], function () use ($router) {

    $router->get ('users', ['uses' => 'RegistrationController@showAllUsers']);

    $router->get ('users/{id}', ['uses' => 'RegistrationController@findById']);

    $router->post ('createuserwithactivation', ['uses' => 'RegistrationController@createUserWithActivation']);

    $router->post ('createuserwithouactivation', ['uses' => 'RegistrationController@createUserWithOutActivation']);

    $router->post ('deleteuser/', ['uses' => 'RegistrationController@deleteUser']);

    $router->put ('users/{email}', ['uses' => 'RegistrationController@updateUser']);

    $router->post ('userdetails', ['uses' => 'RegistrationController@findUserByEmail']);


});
