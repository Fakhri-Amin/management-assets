<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

// Register & login

// Tanah dan Bangunan
$routes->get('/', 'Pages::index');
$routes->get('/tanah-dan-bangunan', 'TanahBangunan::index');

// Peralatan dan Mesin
$routes->get('/peralatan_dan_mesin', 'Peralatan_dan_mesin::index');
$routes->get('/peralatan_dan_mesin/edit/(:num)', 'Peralatan_dan_mesin::edit/$1');
$routes->delete('/peralatan_dan_mesin/(:num)', 'Peralatan_dan_mesin::delete/$1');

// Persediaan
$routes->get('/persediaan', 'Persediaan::index');
$routes->get('/persediaan/edit/(:num)', 'Persediaan::edit/$1');
$routes->delete('/persediaan/(:num)', 'Persediaan::delete/$1');

// Laboratorium
$routes->get('/laboratorium', 'Laboratorium::index');
$routes->get('/laboratorium/edit/(:num)', 'Laboratorium::edit/$1');
$routes->delete('/laboratorium/(:num)', 'Laboratorium::delete/$1');
// $routes->get('/laboratorium/save', 'Laboratorium::save');

// meubellair
$routes->get('/meubellair', 'meubellair::index');
$routes->get('/meubellair/edit/(:num)', 'meubellair::edit/$1');
$routes->delete('/meubellair/(:num)', 'meubellair::delete/$1');

// Aset Lainnya
$routes->get('/aset_lainnya', 'Aset_lainnya::index');
$routes->get('/aset_lainnya/edit/(:num)', 'Aset_lainnya::edit/$1');
$routes->delete('/aset_lainnya/(:num)', 'Aset_lainnya::delete/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
