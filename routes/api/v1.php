<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/api/v1', function () use ($router) {
    return $router->app->version();
});
