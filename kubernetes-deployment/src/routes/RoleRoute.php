<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 07/03/2020
 * Time: 17:14
 */


$router->group (['prefix' => 'api/v1'], function () use ($router) {

    $router->post ('role/getrolebyslug', ['uses' => 'RoleController@getRoleBySlug']);
    $router->post ('role/createrole', ['uses' => 'RoleController@createRole']);
    $router->post ('role/assignusertorole', ['uses' => 'RoleController@assignUserToRole']);
    $router->post ('role/removeuserfromrole', ['uses' => 'RoleController@removeUserFromRole']);
   


});