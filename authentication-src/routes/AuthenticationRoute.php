<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 17/02/2020
 * Time: 19:30
 */

$router->group (['prefix' => 'api/v1'], function () use ($router) {
    
    
    
    $router->post ('loginemail', ['uses' => 'AuthenticationController@loginemail']);
    $router->post ('loginmobile', ['uses' => 'AuthenticationController@loginmobile']);
    $router->post ('logout', ['uses' => 'AuthenticationController@logout']);
});