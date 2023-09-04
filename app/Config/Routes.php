<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/patients/get', 'Patient::getPatients');
$routes->get('/patients/delete/(:num)', 'Patient::removePatient/$1');
$routes->post('/patients/insert', 'Patient::setPatient');
$routes->get('/patients/(:num)', 'Patient::getPatient/$1');
$routes->post('/patients/update', 'Patient::updatePatient');