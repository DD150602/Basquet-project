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

$routes->get('/editAccount', 'Admin::editAccount');
$routes->post('/updateAccount', 'Admin::updateAccount');
$routes->post('/changePassword', 'Admin::changePassword');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/tournaments', 'Admin::tournaments');
$routes->get('/admin/tournaments/insideTournaments/(:num)', 'Admin::insideTournaments/$1');
$routes->get('/admin/tournaments/editMatch/(:num)', 'Admin::editMatchView/$1');
$routes->post('/admin/tournaments/addTeamsToMatch', 'Admin::addTeamsToMatch');
$routes->post('/admin/tournaments/create', 'Admin::createTournament');
$routes->post('/admin/tournaments/createMatch', 'Admin::createMatch');

$routes->get('/admin/teams', 'Admin::teams');
$routes->post('/admin/createTeam', 'Admin::createTeam');
$routes->get('/admin/teams/editTeam/(:num)', 'Admin::editTeamView/$1');

$routes->get('/admin/players', 'Admin::players');
$routes->post('/admin/createPlayer', 'Admin::createPlayer');

$routes->get('/admin/referees', 'Admin::referees');
$routes->post('/admin/createReferee', 'Admin::createReferee');

$routes->get('/admin/calendarManagement', 'Admin::calendarManagement');
$routes->get('/admin/resultsTracking', 'Admin::resultsTracking');
$routes->get('/monitoringTournamentsRankings', 'Home::monitoringTournamentsRankings');
