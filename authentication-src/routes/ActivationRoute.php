<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 19:36
 */

$router->group (['prefix' => 'api'], function () use ($router) {

    $router->post ('Activation/activateuser', ['uses' => 'ActivationController@activateUser']);

    $router->post ('Activation/activationexit', ['uses' => 'ActivationController@activationExit']);

    $router->post ('Activation/activationcompleted', ['uses' => 'ActivationController@activationcompleted']);

    $router->post ('Activation/deactivate', ['uses' => 'ActivationController@deactivate']);

});