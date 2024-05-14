<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
#$routes->get('/', 'Home::index');
$routes->get('/', 'EvalController::index');
$routes->get('/surveys', 'EvalController::surveys');
$routes->get('/admin', 'EvalController::admin');
// Routes for admin
// REF prac5: https://alt-5fd17f67f4120.blackboard.com/
// bbcswebdav/pid-9844314-dt-content-rid-60958335_1/
// courses/INFS3202_7420_22998/Week5/
// lab5.html?one_hash=A1C879437DCC5CBDD5C5FF2B03460DE5&f
// _hash=33A9693F1E2B930E96013FF53B363A58
$routes->group('admin', function($routes) {
    $routes->get('/', 'ResumeController::admin');
    $routes->match(['get', 'post'], 'addedit', 'ResumeController::addedit');
    $routes->match(['get', 'post'], 'addedit/(:num)', 'ResumeController::addedit/$1');
    $routes->get('delete/(:num)', 'ResumeController::delete/$1');
});
$routes->get('/account', 'EvalController::account');
$routes->get('/dashboard', 'EvalController::dashboard');
$routes->get('/statistics', 'EvalController::statistics');
$routes->get('/login', 'EvalController::login');
$routes->get('/signup', 'EvalController::signup');
$routes->get('/survey', 'EvalController::survey');
