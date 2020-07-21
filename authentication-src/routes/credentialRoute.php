<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 28/02/2020
 * Time: 10:36
 */

$router->group (['prefix' => 'api/v1'], function () use ($router) {

    $router->get ('Credential/getcredential', ['uses' => 'CredentialController@getCredential']);


});