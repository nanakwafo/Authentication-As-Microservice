<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 19:36
 */

$router->group (['prefix' => 'api'], function () use ($router) {
    
    $router->post ('activateuser', ['uses' => 'ActivationControllerr@activateUser']);
    
    $router->post ('activationexit', ['uses' => 'ActivationControllerr@activationExit']);
    
    $router->post ('activationcompleted', ['uses' => 'ActivationControllerr@activationcompleted']);
    
    $router->post ('deactivate', ['uses' => 'ActivationControllerr@deactivate']);
    
    
    
});