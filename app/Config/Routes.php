<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'], 'doctors/create', 'Doctors::create');
$routes->match(['get', 'post'], 'doctors/update', 'Doctors::update');
$routes->get('doctors/(:segment)', 'Doctors::edit/$1');
$routes->get('doctors/delete/(:segment)', 'Doctors::delete/$1');
$routes->get('doctors', 'Doctors::index');

$routes->match(['get', 'post'], 'patients/create', 'Patients::create');
$routes->match(['get', 'post'], 'patients/update', 'Patients::update');
$routes->get('patients/(:segment)', 'Patients::edit/$1');
$routes->get('patients/delete/(:segment)', 'Patients::delete/$1');
$routes->get('patients', 'Patients::index');

$routes->match(['get', 'post'], 'operations/create', 'Operations::create');
$routes->match(['get', 'post'], 'operations/update', 'Operations::update');
$routes->get('operations/(:segment)', 'Operations::edit/$1');
$routes->get('operations/delete/(:segment)', 'Operations::delete/$1');
$routes->get('operations', 'Operations::index');

$routes->match(['get', 'post'], 'exams/create', 'Exams::create');
$routes->match(['get', 'post'], 'exams/update', 'Exams::update');
$routes->get('exams/(:segment)', 'Exams::edit/$1');
$routes->get('exams/delete/(:segment)', 'Exams::delete/$1');
$routes->get('exams', 'Exams::index');

$routes->match(['get', 'post'], 'stays/create', 'Stays::create');
$routes->match(['get', 'post'], 'stays/update', 'Stays::update');
$routes->get('stays/(:segment)', 'Stays::edit/$1');
$routes->get('stays/delete/(:segment)', 'Stays::delete/$1');
$routes->get('stays', 'Stays::index');

$routes->get('(:any)', 'Home::index/$1');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
