<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index', ['as' => 'home.index']);
$routes->get('/signin', 'User::signin', ['as' => 'user.signin']);
$routes->get('/signin/github', 'User::login', ['as' => 'user.login']);
$routes->get('/destroy', 'User::destroy', ['as' => 'user.destroy']);


$routes->get('/patients/get', 'Patient::getPatients');
$routes->get('/patients/delete/(:num)', 'Patient::removePatient/$1');
$routes->post('/patients/insert', 'Patient::setPatient');
$routes->get('/patients/(:num)', 'Patient::getPatient/$1');
$routes->post('/patients/update', 'Patient::updatePatient');