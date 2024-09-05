<?php

namespace App\Models;

use CodeIgniter\Model;

class PlayerModel extends Model
{
  protected $table = 'players';
  protected $primaryKey = 'player_id';
  protected $returnType = 'object';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['player_id', 'player_name', 'player_lastname', 'player_number', 'player_condition', 'player_state', 'player_annotation', 'role_id', 'team_id'];

  public function getAllPlayers()
  {
    return $this->select('player_id, player_name, player_lastname, player_number, player_condition, role_name, team_name')
      ->join('roles', 'players.role_id = roles.role_id')
      ->join('teams', 'players.team_id = teams.team_id')
      ->where('player_state', true)
      ->findAll();
  }

  public function getPlayerById($id)
  {
    return $this->select('player_id, player_name, player_lastname, player_number, player_condition, role_name, team_name')
      ->join('roles', 'players.role_id = roles.role_id')
      ->join('teams', 'players.team_id = teams.team_id')
      ->where('player_state', true)
      ->where('player_id', $id)
      ->findAll();
  }

  public function getPlayersByTeam($team_id)
  {
    return $this->select('player_id, player_name, player_lastname, player_number, player_condition, role_name, team_name')
      ->join('roles', 'players.role_id = roles.role_id')
      ->join('teams', 'players.team_id = teams.team_id')
      ->where('team_id', $team_id)
      ->where('player_state', true)
      ->findAll();
  }

  public function createPlayer($data)
  {
    return $this->insert($data);
  }

  public function updatePlayer($data)
  {
    return $this->where('player_id', $data['player_id'])
      ->update($data);
  }
}
