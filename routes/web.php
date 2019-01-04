<?php

use Laravel\Lumen\Routing\Router;

/* @var $router Router */
$router->get('/mobile-version/android', 'MobileAppVersionController@android');
$router->get('/meal/list', 'MealController@list');

$router->group(['middleware' => 'auth'], function (Router $router) {
    $router->post('/meal/create', 'MealAdminController@create');
    $router->post('/link/create', 'MealAdminController@createLink');
});
