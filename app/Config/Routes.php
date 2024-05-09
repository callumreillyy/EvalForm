<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
$routes->get('/', 'EvalController::index');
$routes->get('/surveys', 'EvalController::surveys');
$routes->get('/admin', 'EvalController::admin');
$routes->get('/account', 'EvalController::account');
$routes->get('/dashboard', 'EvalController::dashboard');
$routes->get('/statistics', 'EvalController::statistics');
$routes->get('/login', 'EvalController::login');
$routes->get('/signup', 'EvalController::signup');
$routes->get('/survey', 'EvalController::survey');
