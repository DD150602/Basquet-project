<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\RefereeModel;
use App\Models\MatchTeamModel;

class MatchModel extends Model
{
  protected $table = 'matches';
  protected $primaryKey = 'match_id';
  protected $useAutoIncrement = true;
  protected $returnType = 'object';
  protected $allowedFields = ['match_id', 'match_date', 'match_hour', 'tournament_id', 'match_state', 'match_annotation', 'match_description'];

  private $teamsMatchModel;

  public function getMatchById($id)
  {
    return $this->select('match_id, match_date, match_hour, tournament_id, match_description')
      ->where('match_id', $id)
      ->where('match_state', true)
      ->find();
  }

  public function getMatchFromTournament($tournament_id)
  {
    return $this->select('match_id, match_date, match_hour, tournament_id, match_description')
      ->where('tournament_id', $tournament_id)
      ->where('match_state', true)
      ->findAll();
  }

  public function createMatchWithReferee($data)
  {
    $this->insert($data);
  }

  public function assignTeamsToMatch($data)
  {
    $this->teamsMatchModel = new MatchTeamModel();
    $this->transStart();

    $match_id = $data['match_id'];

    foreach ($data['teamsData'] as $team) {
      $team_id = $team['team_id'];

      $this->teamsMatchModel->insert([
        'match_team_points' => $team['match_team_points'],
        'match_team_comments' => $team['match_team_comments'],
        'match_id' => $match_id,
        'team_id' => $team_id
      ]);
    }

    $this->transComplete();
  }

  public function updateMatch($data)
  {
    $this->where('match_id', $data['match_id']);
    $this->update($data);
  }
}
