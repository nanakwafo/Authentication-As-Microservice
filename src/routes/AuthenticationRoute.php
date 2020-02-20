<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 19:30
 */

$router->group (['prefix' => 'api'], function () use ($router) {
    
    $router->post ('login', ['uses' => 'AuthenticationController@login']);
    
    $router->post ('logout', ['uses' => 'AuthenticationController@logout']);
});