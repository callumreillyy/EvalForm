<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
$routes->get('/', 'ResumeController::index');
$routes->get('/surveys', 'ResumeController::surveys');
