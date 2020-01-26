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


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('users',  ['uses' => 'RegistrationController@showAllUsers']);

    $router->get('users/{id}', ['uses' => 'RegistrationController@showOneUser']);

    $router->post('user', ['uses' => 'RegistrationController@createUserWithActivation']);

    $router->delete('users/{id}', ['uses' => 'RegistrationController@delete']);

    $router->put('users/{id}', ['uses' => 'RegsitrationController@update']);
});