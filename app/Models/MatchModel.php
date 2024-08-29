<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchModel extends Model
{
  protected $table = 'matches';
  protected $primaryKey = 'match_id';
  protected $useAutoIncrement = true;
  protected $returnType = 'object';
  protected $allowedFields = ['match_date', 'match_hour', 'match_tournament_id', 'match_state', 'match_annotation'];

  public function createMatch($data)
  {
    $this->insert($data);
  }

  public function updateMatch($data)
  {
    $this->where('match_id', $data['match_id']);
    $this->update($data);
  }
}
