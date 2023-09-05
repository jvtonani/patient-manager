<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', [
    'as' => 'home.index',
    'filter' => 'session'
]);

$routes->get('/signin', 'User::signin', ['as' => 'user.signin']);
$routes->get('/signin/github', 'User::login', ['as' => 'user.login']);
$routes->get('/destroy', 'User::destroy', ['as' => 'user.destroy']);

$routes->get('/patients/get', 'Patient::getPatients', ['filter' => 'session']);
$routes->get('/patients/delete/(:num)', 'Patient::removePatient/$1', ['filter' => 'session']);
$routes->post('/patients/insert', 'Patient::setPatient', ['filter' => 'session']);
$routes->get('/patients/(:num)', 'Patient::getPatient/$1', ['filter' => 'session']);
$routes->post('/patients/update', 'Patient::updatePatient', ['filter' => 'session']);
