<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->post('/login-in', 'Login::login');
$routes->get('/logout', 'Login::logout');

$routes->get('/createAcount', 'CreateAcount::index');
$routes->post('/createAcount', 'CreateAcount::createAcount');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/tournaments', 'Admin::tournaments');
$routes->get('/admin/tournaments/insideTournaments/(:num)', 'Admin::insideTournaments/$1');
$routes->post('/admin/tournaments/create', 'Admin::createTournament');

$routes->get('/admin/teams', 'Admin::teams');
$routes->get('/admin/players', 'Admin::players');
$routes->get('/admin/referees', 'Admin::referees');
$routes->get('/admin/calendarManagement', 'Admin::calendarManagement');
$routes->get('/admin/resultsTracking', 'Admin::resultsTracking');
$routes->get('/monitoringTournamentsRankings', 'Home::monitoringTournamentsRankings');
