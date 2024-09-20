<?php

namespace App\Controllers;

use App\Models\TournamentModel;
use App\Models\TeamModel;
use App\Models\PlayerModel;
use App\Models\RefereeModel;
use Config\Services;

class Admin extends BaseController
{
  protected $tournamentModel;
  protected $teamModel;
  protected $playerModel;
  protected $refereeModel;
  protected $data = [];

  public function __construct()
  {
    $this->tournamentModel = new TournamentModel();
    $this->teamModel = new TeamModel();
    $this->playerModel = new PlayerModel();
    $this->refereeModel = new RefereeModel();
    $this->data['login_info'] = Services::session()->get('login_info');
    $this->data['total_tournaments'] = $this->tournamentModel->countAll();
    $this->data['total_teams'] = $this->teamModel->countAll();
    $this->data['total_players'] = $this->playerModel->countAll();
    $this->data['total_referees'] = $this->refereeModel->countAll();
  }

  public function index()
  {
    return view('Admin/Admin_page', $this->data);
  }

  public function tournaments()
  {
    $this->data['tournaments'] = $this->tournamentModel->getAllTournaments();
    return view('Admin/Tournaments_page', $this->data);
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
