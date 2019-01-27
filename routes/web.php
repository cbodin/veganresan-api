<?php

use Laravel\Lumen\Routing\Router;

/* @var $router Router */

/** Web routes */
$router->get('/download', 'DownloadController@download');

/** API Routes */
$router->get('/app-info/{platform}-{version}', 'AppInfoController@version');
$router->get('/meal/list', 'MealController@list');

$router->group(['middleware' => 'auth'], function (Router $router) {
    $router->post('/login/validate', 'LoginController@validateLogin');

    $router->post('/meal/create', 'MealAdminController@create');
    $router->post('/link/create', 'MealAdminController@createLink');
});
