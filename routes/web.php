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
    return view('docs');
});

$router->get('/problems', 'ProblemController@index');
$router->get('/problems/random', 'ProblemController@random');
$router->get('/problems/{id}', 'ProblemController@show');
$router->post('/problems/{id}', 'ProblemController@test');
$router->post('/solve', 'SolutionController@solve');
$router->post('/test', 'SolutionController@test');