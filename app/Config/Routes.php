<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
$routes->get('/', 'EvalController::index');
$routes->get('/surveys', 'EvalController::surveys');
$routes->get('/admin', 'EvalController::admin');
