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
$routes->setDefaultController('PostController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/post', 'PostController::index');
// $routes->post('post/add', 'PostController::add');
// $routes->get('post/fetch', 'PostController::fetch');
// $routes->get('post/edit/(:num)', 'PostController::edit/$1');
// $routes->get('post/delete/(:num)', 'PostController::delete/$1');
// $routes->get('post/detail/(:num)', 'PostController::detail/$1');
// $routes->post('post/update', 'PostController::update');

$routes->get('/campus', 'CampusController::index');
$routes->post('campus/table', 'CampusController::table');
$routes->post('campus/getModal', 'CampusController::getModal');
$routes->post('campus/saveData', 'CampusController::saveData');
$routes->post('campus/deleteData', 'CampusController::deleteData');




$routes->post('campus/add', 'CampusController::add');
$routes->get('campus/fetch', 'CampusController::fetch');
$routes->post('campus/edit/', 'CampusController::edit');
$routes->get('campus/delete/(:num)', 'CampusController::delete/$1');
$routes->get('campus/detail/(:num)', 'CampusController::detail/$1');
$routes->post('campus/update', 'CampusController::update');
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