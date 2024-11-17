<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/', 'Home::index');

$routes->group('/setup', function ($routes) {
    $routes->match(['get', 'post'], '/', 'Vote::setup');
    $routes->match(['get', 'post'], '(:any)', 'Vote::setup/$1');
});

$routes->get('share/(:any)', 'Vote::share/$1');
