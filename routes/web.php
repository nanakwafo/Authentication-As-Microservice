<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'resources/api'], function () use ($router) {
    $router->get('users',  ['uses' => 'RegistrationController@showAllUsers']);

    $router->get('users/{id}', ['uses' => 'RegistrationController@findById']);

    $router->post('users', ['uses' => 'RegistrationController@createUserWithActivation']);
    $router->post('users', ['uses' => 'RegistrationController@createUserWithOutActivation']);

    $router->delete('users/{id}', ['uses' => 'RegistrationController@deleteUser']);

    $router->put('users/{id}', ['uses' => 'RegsitrationController@updateUser']);

    $router->put('users/{id}', ['uses' => 'RegsitrationController@findUserById']);
    $router->put('users/{email}', ['uses' => 'RegsitrationController@findByCredentials']);
    $router->put('users/{username}', ['uses' => 'RegsitrationController@findByUsername']);


    $router->post('login', ['uses' => 'AuthenticationController@login']);

});