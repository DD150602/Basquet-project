<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->post('/login-in', 'Login::login');
$routes->get('/logout', 'Login::logout');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/tournaments', 'Admin::tournaments');
$routes->get('/admin/tournaments/insideTournaments', 'Admin::insideTournaments');
$routes->get('/admin/teams', 'Admin::teams');
$routes->get('/admin/players', 'Admin::players');
$routes->get('/admin/referees', 'Admin::referees');
$routes->get('/admin/calendarManagement', 'Admin::calendarManagement');
$routes->get('/admin/resultsTracking', 'Admin::resultsTracking');
$routes->get('/monitoringTournamentsRankings', 'Home::monitoringTournamentsRankings');
