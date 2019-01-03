<?php
/* @var $router \Laravel\Lumen\Routing\Router */

$router->get('/mobile-version/android', 'MobileAppVersionController@android');

$router->post('/meal/create', 'MealAdminController@create');
