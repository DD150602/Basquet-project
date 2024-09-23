<?php

namespace App\Controllers;

use App\Models\TournamentModel;
use App\Models\TeamModel;
use App\Models\PlayerModel;
use App\Models\RefereeModel;
use App\Models\MatchModel;
use Config\Services;

class Admin extends BaseController
{
  protected $tournamentModel;
  protected $teamModel;
  protected $playerModel;
  protected $refereeModel;
  protected $matchModel;
  protected $data = [];

  public function __construct()
  {
    $this->tournamentModel = new TournamentModel();
    $this->teamModel = new TeamModel();
    $this->playerModel = new PlayerModel();
    $this->refereeModel = new RefereeModel();
    $this->matchModel = new MatchModel();
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

  public function insideTournaments($id)
  {
    $this->data['tournament'] = $this->tournamentModel->getTournamentById($id);
    $this->data['matchesTournament'] = $this->matchModel->getMatchFromTournament($id);
    $this->data['referees'] = $this->refereeModel->getAllReferees();
    return view('Admin/Inside_tournaments_page', $this->data);
  }

  public function createTournament()
  {
    $this->tournamentModel->createTournament($this->request->getPost());
    return redirect()->to('/admin/tournaments');
  }

  public function teams()
  {
    $this->data['teams'] = $this->teamModel->getAllTeams();
    return view('Admin/Team_page', $this->data);
  }

  public function players()
  {
    $this->data['players'] = $this->playerModel->getAllPlayers();
    return view('Admin/Player_page', $this->data);
  }

  public function referees()
  {
    $this->data['referees'] = $this->refereeModel->getAllReferees();
    return view('Admin/Referees_page', $this->data);
  }

  public function createReferee()
  {
    $this->refereeModel->createReferee($this->request->getPost());
    return redirect()->to('/admin/referees');
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
