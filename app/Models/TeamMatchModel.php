<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamMatchModel extends Model
{
  protected $table = 'teams_has_matches';
  protected $primaryKey = 'teams_match_id';
  protected $allowedFields = ['team_id', 'match_id'];
  protected $returnType = 'object';
}
