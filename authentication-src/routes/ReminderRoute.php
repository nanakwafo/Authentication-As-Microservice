<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 07/03/2020
 * Time: 17:14
 */

$router->group (['prefix' => 'api/v1'], function () use ($router) {

    $router->get ('reminder/createuserreminder', ['uses' => 'ReminderController@createUserReminder']);
    $router->get ('reminder/checkifreminderforifuserexit', ['uses' => 'ReminderController@checkIfReminderForIfUserExit']);
    $router->get ('reminder/remindercomplete', ['uses' => 'ReminderController@reminderComplete']);
    $router->get ('reminder/removeexpiredreminder', ['uses' => 'ReminderController@removeExpiredReminder']);


});