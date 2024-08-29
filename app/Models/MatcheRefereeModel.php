<?php

namespace App\Models;

use CodeIgniter\Model;

class MatcheRefereeModel extends Model
{
  protected $table = 'matches_has_referees';
  protected $primaryKey = 'match_referee_id';
  protected $allowedFields = ['match_id', 'referee_id'];
  protected $returnType = 'object';
}
