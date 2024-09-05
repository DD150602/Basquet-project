<?php

namespace App\Models;

use CodeIgniter\Model;

class TournamentModel extends Model
{
  protected $table = 'tournaments';
  protected $primaryKey = 'tournament_id';
  protected $returnType = 'object';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['tournament_id', 'tournament_name', 'tournament_start_date', 'tournament_end_date', 'tournament_state', 'tournament_canceled', 'tournament_annotation'];

  public function getAllTournaments()
  {
    return $this->select('tournament_id, tournament_name, tournament_start_date, tournament_end_date, tournament_state')
      ->where('tournament_canceled', false)
      ->findAll();
  }

  public function getTournamentById($id)
  {
    return $this->select('tournament_id, tournament_name, tournament_start_date, tournament_end_date, tournament_state')
      ->where('tournament_id', $id)
      ->where('tournament_canceled', false)
      ->find();
  }

  public function createTournament($data)
  {
    return $this->insert($data);
  }

  public function updateTournament($data)
  {
    $this->where('tournament_id', $data['tournament_id'])
      ->update($data);
  }
}
