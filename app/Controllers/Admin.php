<?php

namespace App\Controllers;

class Admin extends BaseController
{
  public function index()
  {
    return view('Admin/Admin_page');
  }

  public function tournaments()
  {
    return view('Admin/Tournaments_page');
  }

  public function insideTournaments()
  {
    return view('Admin/Inside_tournaments_page');
  }

  public function teams()
  {
    return view('Admin/Team_page');
  }

  public function players()
  {
    return view('Admin/Player_page');
  }

  public function referees()
  {
    return view('Admin/Referees_page');
  }

  public function calendarManagement()
  {
    return view('Admin/Match_Calendar_Managemen_page');
  }

  public function resultsTracking()
  {
    return view('Admin/Results_Tracking_page');
  }
}
