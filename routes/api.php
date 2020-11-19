<?php

$router->group(['prefix' => '/api'], function () use ($router) {
    $controller = 'ApiController';
    $router->get('/test-data', ['uses' => $controller . '@getTestData']);
    $router->get('/db-data', ['uses' => $controller . '@getDbData']);
});
