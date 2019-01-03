<?php
/* @var $router \Laravel\Lumen\Routing\Router */

$router->get('/mobile-version/android', 'MobileAppVersionController@android');

$router->post('/meal/create', 'MealAdminController@create');
$router->post('/link/create', 'MealAdminController@createLink');

$router->get('/meal/list', 'MealController@list');
