<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/patients/get', 'Patient::getPatients');
$routes->delete('/patients/delete', 'Patient::removePatient');
$routes->post('/patients/insert', 'Patient::setPatient');
$routes->patch('/patients/update', 'Patient::updatePatient');