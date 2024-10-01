<?php

namespace App\Controllers;

use App\Models\TournamentModel;
use App\Models\TeamModel;
use App\Models\PlayerModel;
use App\Models\RefereeModel;
use App\Models\MatchModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\MatchTeamModel;
use Config\Services;

class Admin extends BaseController
{
  protected $tournamentModel;
  protected $teamModel;
  protected $playerModel;
  protected $refereeModel;
  protected $roleModel;
  protected $matchModel;
  protected $userModel;
  protected $matchTeamModel;
  protected $data = [];

  public function __construct()
  {
    $this->tournamentModel = new TournamentModel();
    $this->teamModel = new TeamModel();
    $this->playerModel = new PlayerModel();
    $this->refereeModel = new RefereeModel();
    $this->roleModel = new RoleModel();
    $this->matchModel = new MatchModel();
    $this->userModel = new UserModel();
    $this->matchTeamModel = new MatchTeamModel();
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

  public function createMatch()
  {
    $completeDate = $this->request->getPost('match_date');
    $separatedDate = explode('T', $completeDate);
    $date = $separatedDate[0];
    $hour = $separatedDate[1];
    $date = date('Y-m-d', strtotime($date));
    $hour = date('H:i', strtotime($hour));
    $referee_id = intval($this->request->getPost('referees'));
    $data = [
      'tournament_id' => intval($this->request->getPost('tournament_id')),
      'match_date' => $date,
      'match_hour' => $hour,
      'match_description' => $this->request->getPost('match_description'),
      'referee_id' => $referee_id
    ];
    $this->matchModel->createMatchWithReferee($data);
    return redirect()->back()->with('message', 'Match created successfully');
  }

  public function editMatchView($id)
  {
    $this->data['match'] = $this->matchModel->getMatchById($id);
    $this->data['teams'] = $this->teamModel->getAllTeams();
    $this->data['teamsInMatch'] = $this->matchTeamModel->getTeamsInMatch($id);
    $this->data['referees'] = $this->refereeModel->getAllReferees();
    return view('Admin/Edit_match', $this->data);
  }

  public function addTeamsToMatch()
  {
    $data = $this->request->getPost();
    $responce = $this->matchTeamModel->assignTeamsToMatch($data);
    return redirect()->back()->with('message', $responce['message']);
  }
  public function teams()
  {
    $this->data['teams'] = $this->teamModel->getAllTeams();
    return view('Admin/Team_page', $this->data);
  }

  public function createTeam()
  {
    $this->teamModel->createTeam($this->request->getPost());
    return redirect()->to('/admin/teams');
  }

  public function editTeamView($id)
  {
    $this->data['team'] = $this->teamModel->getTeamById($id);
    return view('Admin/Edit_team', $this->data);
  }

  public function players()
  {
    $this->data['teams'] = $this->teamModel->getAllTeams();
    $this->data['roles'] = $this->roleModel->getAllRoles();
    $this->data['players'] = $this->playerModel->getAllPlayers();
    return view('Admin/Player_page', $this->data);
  }

  public function createPlayer()
  {
    $data = [
      'player_name' => $this->request->getPost('player_name'),
      'player_lastname' => $this->request->getPost('player_lastname'),
      'player_number' => $this->request->getPost('player_number'),
      'player_condition' => $this->request->getPost('player_condition'),
      'role_id' => $this->request->getPost('player_position'),
      'team_id' => $this->request->getPost('player_team')
    ];
    $this->playerModel->createPlayer($data);
    return redirect()->to('/admin/players');
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
    return view('Admin/Match_Calendar_Management_page', $this->data);
  }

  public function resultsTracking()
  {
    return view('Admin/Results_Tracking_page', $this->data);
  }

  public function editAccount()
  {
    return view('/editUserInfo', $this->data);
  }

  public function updateAccount()
  {
    $rules = [
      'user_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'The name field is required'
        ]
      ],
      'user_lastname' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'The lastname field is required'
        ]
      ],
      'user_username' => [
        'rules' => 'required|is_unique[users.user_username]',
        'errors' => [
          'required' => 'The username field is required',
          'is_unique' => 'The username field must be unique'
        ]
      ]
    ];

    if ($this->request->getPost('user_email')) {
      $rules['user_email'] = [
        'rules' => 'required|valid_email|is_unique[users.user_email]',
        'errors' => [
          'required' => 'The email field is required',
          'valid_email' => 'The email field must contain a valid email address'
        ]
      ];
    }
    if (!$this->validate($rules)) {
      print_r($this->validator->getErrors());
      return redirect()->back()->withInput();
    } else {
      $data = $this->request->getPost();
      print_r($data);
      // $this->userModel->updateAccount($data); 
      return redirect()->back()->with('message', 'Account updated successfully');
    }
  }

  public function changePassword()
  {
    $rules = [
      'old_user_password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'The old password field is required'
        ]
      ],
      'user_password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'The password field is required'
        ]
      ],
      'confirm_password' => [
        'rules' => 'required|matches[user_password]',
        'errors' => [
          'required' => 'The confirm password field is required',
          'matches' => 'The confirm password field must match the password field'
        ]
      ]
    ];

    if (!$this->validate($rules)) {
      return redirect()->to('/editAccount')->with('message', 2)->withInput();
    } else {
      $data = [
        'user_id' => session('login_info')['user_id'],
        'old_user_password' => $this->request->getPost('old_user_password'),
        'user_password' => $this->request->getPost('user_password')
      ];
      $responce = $this->userModel->updatePassword($data);
      if (!$responce['check_password']) {
        return redirect()->to('/editAccount')->with('message', $responce['message']);
      }
      session()->destroy();
      return redirect()->to('login');
    }
  }
}
