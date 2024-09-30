<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchModel extends Model
{
  protected $table = 'matches';
  protected $primaryKey = 'match_id';
  protected $useAutoIncrement = true;
  protected $returnType = 'object';
  protected $allowedFields = ['match_id', 'match_date', 'match_hour', 'tournament_id', 'match_state', 'match_annotation', 'match_description', 'referee_id'];

  public function getMatchById($id)
  {
    return $this->select('match_id, match_date, match_hour, tournament_name, match_description')
      ->join('tournaments', 'matches.tournament_id = tournaments.tournament_id')
      ->where('match_id', $id)
      ->where('match_state', true)
      ->first();
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

  public function updateMatch($data)
  {
    $this->where('match_id', $data['match_id']);
    $this->update($data);
  }
}
