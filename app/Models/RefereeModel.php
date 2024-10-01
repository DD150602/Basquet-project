<?php

namespace App\Models;

use CodeIgniter\Model;

class RefereeModel extends Model
{
  protected $table = 'referees';
  protected $primaryKey = 'referee_id';
  protected $allowedFields = ['referee_name', 'referee_state', 'referee_annotation'];

  public function getAllReferees()
  {
    $subQuery = $this->db->table('matches')
      ->select('referee_id, COUNT(*) as matches_count')
      ->where('match_state', true)
      ->groupBy('referee_id')
      ->getCompiledSelect();

    return $this->select('referees.referee_id, referee_name, matches_count')
      ->join('(' . $subQuery . ') matches', 'matches.referee_id = referees.referee_id', 'left')
      ->where('referees.referee_state', true)
      ->orderBy('matches_count', 'desc')
      ->findAll();
  }

  public function getRefereeById($id)
  {
    return $this->where('referee_id', $id)
      ->find();
  }

  public function createReferee($data)
  {
    return $this->insert($data);
  }

  public function updateReferee($data)
  {
    return $this->where('referee_id', $data['referee_id'])
      ->update($data);
  }
}
