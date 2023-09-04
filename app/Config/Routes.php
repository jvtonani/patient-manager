<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::signin');
$routes->get('/patients/get', 'User::getPatients');
$routes->delete('/patients/remove', 'User::removePatient');
