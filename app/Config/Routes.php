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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->get('/pages/index','Pages::index');
$routes->get('/pages/about','Pages::about');
$routes->get('/pages/contact','Pages::contact');
$routes->get('/news','News::index');
$routes->get('/news/insert','News::insert');
$routes->get('/pages/login','Pages::login');
$routes->get('/pages/register','Pages::register');
$routes->get('/news/edit/(:any)', 'News::edit/$1');
$routes->get('/news/detail/(:num)', 'News::detail/$1');
$routes->delete('/news/(:num)','News::delete/$1');
$routes->post('/news/save', 'News::save');
$routes->post('/news/update/(:num)','News::update/$1');
$routes->post('/auth/login','Auth::login');
$routes->post('/auth/register','Auth::register');
$routes->get('/auth/register','Auth::login');
$routes->get('/auth/logout','Auth::logout');

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
