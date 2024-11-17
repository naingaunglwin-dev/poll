<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('/setup', function ($routes) {
    $routes->match(['get', 'post'], '/', 'Vote::setup');
    $routes->match(['get', 'post'], '(:any)', 'Vote::setup/$1');
});
