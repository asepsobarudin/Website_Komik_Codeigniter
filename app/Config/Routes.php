<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/home', 'Pages::home');
$routes->get('/detail/(:segment)', 'Pages::detail/$1');
$routes->get('/pesanan', 'Pages::pesanan');
$routes->post('/pesanan/batal', 'Crud::batal');
$routes->get('/all/(:segment)', 'Pages::all/$1');
$routes->post('/buy', 'Crud::pesan');

// Admin
$routes->get('/admin', 'Admin::admin');
$routes->get('/admin/insert', 'Admin::insert');
$routes->post('/admin/save', 'Crud::save');
$routes->get('/admin/pesanan_admin', 'Admin::pesanan_admin');
$routes->post('/admin/kirim', 'Crud::kirim');
$routes->get('/admin/edit/(:segment)', 'Admin::edit/$1');
$routes->post('/admin/update/(:segment)', 'Crud::update/$1');
$routes->delete('/admin/(:num)', 'Crud::delete/$1');
$routes->get('/admin/(:any)', 'Admin::detail_admin/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
