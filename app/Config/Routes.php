<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('proses/view_antri', 'KendaraanController::antri');

$routes->post('proses/create_antri', 'KendaraanController::create_antri');
$routes->get('proses/mulai-bongkar/(:num)', 'KendaraanController::mulaiBongkar/$1');
$routes->get('proses/mulai-dempul/(:num)', 'KendaraanController::mulaiDempul/$1');
$routes->get('proses/mulai-cat/(:num)', 'KendaraanController::mulaiCat/$1');
$routes->get('proses/mulai-poles/(:num)', 'KendaraanController::mulaiPoles/$1');
$routes->get('proses/mulai-finish/(:num)', 'KendaraanController::mulaiFinish/$1');
$routes->get('proses/mulai-siapkeluar/(:num)', 'KendaraanController::mulaiSiapKeluar/$1');
$routes->get('proses/mulai-keluar/(:num)', 'KendaraanController::mulaiKeluar/$1');




$routes->get('proses/view_bongkar', 'KendaraanController::bongkar');
$routes->get('proses/view_dempul', 'KendaraanController::dempul');
$routes->get('proses/view_cat', 'KendaraanController::cat');
$routes->get('proses/view_poles', 'KendaraanController::poles');
$routes->get('proses/view_finish', 'KendaraanController::finish');
$routes->get('proses/view_siapkeluar', 'KendaraanController::siapKeluar');
$routes->get('proses/view_keluar', 'KendaraanController::keluar');
$routes->get('proses/view_stop', 'KendaraanController::stop');
