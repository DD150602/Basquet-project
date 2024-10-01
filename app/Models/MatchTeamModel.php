<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchTeamModel extends Model
{
  protected $table = 'matches_has_teams';
  protected $primaryKey = 'match_team_id';
  protected $allowedFields = ['match_team_id', 'team_id', 'match_id', 'match_team_points', 'match_team_comments'];
  protected $returnType = 'object';

  public function getTeamsInMatch($match_id)
  {
    return $this->select('team_name, matches_has_teams.team_id, match_team_points, match_team_comments')
      ->join('teams', 'matches_has_teams.team_id = teams.team_id')
      ->where('match_id', $match_id)
      ->findAll();
  }

  public function assignTeamsToMatch($data)
  {
    $teams = $this->verifyTeamsInMatch($data);
    if ($teams[0]->team_count == 2) {
      return [
        'message' => 2,
      ];
    }
    if ($this->verifyDuplicatedTeamInMatch($data)) {
      return [
        'message' => 3,
      ];
    }

    $this->insert($data);
    return [
      'message' => 1,
    ];
  }

  private function verifyTeamsInMatch($data)
  {
    return $this->selectCount('team_id', 'team_count')
      ->where('match_id', $data['match_id'])
      ->findAll();
  }

  private function verifyDuplicatedTeamInMatch($data)
  {
    return $this->select('match_id, team_id')
      ->where('match_id', $data['match_id'])
      ->where('team_id', $data['team_id'])
      ->first();
  }
}
