<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home route
$routes->get('/', 'EvalController::index');

// Survey routes
$routes->get('surveys/(:num)', 'EvalController::surveys/$1', ['filter' => 'login']);
$routes->group('surveys', ['filter' => 'login'], function($routes) {
    $routes->get('/', 'EvalController::surveys/');
    $routes->match(['get', 'post'], 'addeditSurvey', 'EvalController::addeditSurvey');
    $routes->match(['get', 'post'], 'addeditSurvey/(:num)', 'EvalController::addeditSurvey/$1');
    $routes->get('deleteSurvey/(:num)', 'EvalController::deleteSurvey/$1');
});


// Routes for admin
// REF prac5: https://alt-5fd17f67f4120.blackboard.com/
// bbcswebdav/pid-9844314-dt-content-rid-60958335_1/
// courses/INFS3202_7420_22998/Week5/
// lab5.html?one_hash=A1C879437DCC5CBDD5C5FF2B03460DE5&f
// _hash=33A9693F1E2B930E96013FF53B363A58
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'EvalController::admin');
    $routes->match(['get', 'post'], 'addedit', 'EvalController::addedit');
    $routes->match(['get', 'post'], 'addedit/(:num)', 'EvalController::addedit/$1');
    $routes->get('delete/(:num)', 'EvalController::delete/$1');
});

// Route for adding / editing survey questions
$routes->get('/surveyQuestions/(:num)', 'EvalController::surveyQuestions/$1', ['filter' => 'login']);

// Google login authentication
$routes->get('/login', 'Auth::google_login');  // Route to initiate Google login
$routes->get('/login/callback', 'Auth::google_callback');  // Callback route after Google auth
$routes->get('/logout', 'Auth::logout');

// RESTful api routes
$routes->resource('survey');
$routes->resource('textQuestion');
$routes->resource('multipleQuestion');
$routes->resource('option');

