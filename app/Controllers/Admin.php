<?php

namespace App\Controllers;

class Admin extends BaseController
{
  public function index()
  {
    return view('Admin_page');
  }

  public function tournaments()
  {
    return view('Tournaments_page');
  }

  public function insideTournaments()
  {
    return view('Inside_tournaments_page');
  }

  public function teams()
  {
    return view('Team_page');
  }

  public function players()
  {
    return view('Player_page');
  }

  public function referees()
  {
    return view('Referees_page');
  }

  public function calendarManagement()
  {
    return view('Match_Calendar_Managemen_page');
  }

  public function resultsTracking()
  {
    return view('Results_Tracking_page');
  }
}
