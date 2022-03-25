<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    $router->group(['prefix' => 'category'], function () use ($router) {
        $router->post('store', 'CategoryController@store');
        $router->put('update/{id}', 'CategoryController@update');
        $router->delete('detete/{id}', 'CategoryController@destory');

        $router->get('get/{id}', 'CategoryController@show');
        $router->get('getAll', 'CategoryController@showAll');

        $router->get('getWithProduct', 'CategoryController@showWithProduct');

    });

    $router->group(['prefix' => 'product'], function () use ($router) {
        $router->post('store', 'ProductController@store');
        $router->put('update/{id}', 'ProductController@update');
        $router->delete('detete/{id}', 'ProductController@destory');
        $router->get('get/{id}', 'ProductController@show');
        $router->get('getAll', 'ProductController@showAll');
    });
});
