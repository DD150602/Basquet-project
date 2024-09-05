<?php

namespace App\Models;

use CodeIgniter\Model;

class RefereeModel extends Model
{
  protected $table = 'referees';
  protected $primaryKey = 'referee_id';
  protected $allowedFields = ['referee_name', 'referee_state', 'referee_annotation'];

  public function getReferees()
  {
    return $this->findAll();
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
