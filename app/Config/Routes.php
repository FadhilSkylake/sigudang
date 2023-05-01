<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
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
$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::cekLogin');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::index');

//user
$routes->group('user', function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->get('create', 'UserController::create');
    $routes->delete('(:num)', 'UserController::delete/$1');
    $routes->post('save', 'UserController::save');
    $routes->get('edit/(:num)', 'UserController::edit/$1');
    $routes->match(['get', 'post'], 'update/(:num)', 'UserController::update/$1');
});

//gudang
$routes->group('gudang', static function ($routes) {
    $routes->get('/', 'GudangController::index');
    $routes->get('create', 'GudangController::create');
    $routes->delete('(:num)', 'GudangController::delete/$1');
    $routes->match(['get', 'post'], 'update/(:num)', 'GudangController::update/$1');
    $routes->post('save', 'GudangController::save');
    $routes->get('(:num)', 'GudangController::detail/$1');
});

//laporan
$routes->group('laporan', static function ($routes) {
    $routes->get('/', 'LaporanController::index');
    $routes->get('create', 'LaporanController::create');
    $routes->delete('(:num)', 'LaporanController::delete/$1');
    $routes->match(['get', 'post'], 'update/(:num)', 'LaporanController::update/$1');
    $routes->post('save', 'LaporanController::save');
    $routes->get('(:num)', 'LaporanController::detail/$1');
    $routes->get('cetak/(:num)', 'LaporanController::cetak/$1');
});

//stok
$routes->group('stok', static function ($routes) {
    $routes->get('/', 'StokController::index');
    $routes->get('create', 'StokController::create');
    $routes->delete('(:num)', 'StokController::delete/$1');
    $routes->match(['get', 'post'], 'update/(:num)', 'StokController::update/$1');
    $routes->post('save', 'StokController::save');
    $routes->get('edit/(:num)', 'StokController::edit/$1');
    $routes->match(['get', 'post'], 'update/(:num)', 'StokController::update/$1');
});

//transaksi
$routes->group('transaksi', static function ($routes) {
    $routes->get('/', 'TransaksiController::index');
    $routes->get('create', 'TransaksiController::create');
    $routes->delete('(:num)', 'TransaksiController::delete/$1');
    $routes->match(['get', 'post'], 'update/(:num)', 'TransaksiController::update/$1');
    $routes->post('save', 'TransaksiController::save');
    $routes->post('berkurang', 'TransaksiController::berkurang');
    $routes->get('edit/(:num)', 'TransaksiController::edit/$1');
    $routes->match(['get', 'post'], 'update/(:num)', 'TransaksiController::update/$1');
    $routes->delete('(:num)', 'TransaksiController::delete/$1');
});

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
