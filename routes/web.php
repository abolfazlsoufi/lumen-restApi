<?php

/** @var Router $router */
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

use App\Http\Controllers\UserController;
use Laravel\Lumen\Routing\Router;
use App\Http\Middleware\AuthMiddleware;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// UserRoute
$router->get("users","UserController@show");
$router->get("user/{id}","UserController@showId");
$router->post("user","UserController@create");
$router->put("user/{id}","UserController@update");
$router->delete("user/{id}","UserController@delete");
$router->delete("auth","UserController@authenticate");

// RoleRoute
$router->get("roles","RoleController@show");
$router->post("role","RoleController@create");
$router->delete("role/{id}","RoleController@delete");
$router->put("role/{id}","RoleController@update");



