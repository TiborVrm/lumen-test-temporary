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

/**
 *  Laravel\Lumen\Routing\Router $router
 */
//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->group(['middleware' => 'client'], function () use ($router) {

    $router->get('transactions', function () {
        return 'No transactions found';
    });

    $router->post('transactions/{id}', 'Controller@handlePost');
    $router->get('transactions/{id}', 'Controller@handleGet');
});

$router->post('transactions', function () {
    return 'No ID given';
});

