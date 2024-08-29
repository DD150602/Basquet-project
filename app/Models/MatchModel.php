<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\RefereeModel;
use App\Models\MatcheRefereeModel;

class MatchModel extends Model
{
  protected $table = 'matches';
  protected $primaryKey = 'match_id';
  protected $useAutoIncrement = true;
  protected $returnType = 'object';
  protected $allowedFields = ['match_date', 'match_hour', 'match_tournament_id', 'match_state', 'match_annotation'];

  private $refereeModel;
  private $matcheRefereeModel;

  public function __construct()
  {
    $this->refereeModel = new RefereeModel();
    $this->matcheRefereeModel = new MatcheRefereeModel();
    
  }

  public function createMatchWithReferee($data)
  {
    $db = \Config\Database::connect();
    $db->transStart();


    $this->insert($data['matchData']);
    $match_id = $db->insertID();

    foreach ($data['refereesData'] as $referee) {
      $referee_id = $this->refereeModel->getRefereeById($referee['referee_id'])->referee_id;

      $this->matcheRefereeModel->insert([
        'match_id' => $match_id,
        'referee_id' => $referee_id
      ]);
    }

    $db->transComplete();
  }

  public function updateMatch($data)
  {
    $this->where('match_id', $data['match_id']);
    $this->update($data);
  }
}
