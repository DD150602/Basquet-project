<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
  protected $table = 'teams';
  protected $primaryKey = 'team_id';
  protected $useAutoIncrement = true;
  protected $returnType = 'object';
  protected $allowedFields = ['team_name', 'team_total_points', 'team_state', 'team_annotation'];

  public function getAllTeams()
  {
    return $this->select('team_id, team_name, team_total_points')
      ->where('team_state', true)
      ->findAll();
  }

  public function getTeamById($id)
  {
    return $this->select('team_id, team_name, team_total_points')
      ->where('team_id', $id)
      ->where('team_state', true)
      ->find();
  }

  public function createTeam($data)
  {
    return $this->insert($data);
  }

  public function updateTeam($data)
  {
    $this->where('team_id', $data['team_id']);
    return $this->update($data);
  }
}
