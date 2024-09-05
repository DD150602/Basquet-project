<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchTeamModel extends Model
{
  protected $table = 'matches_has_teams';
  protected $primaryKey = 'match_team_id';
  protected $allowedFields = ['team_id', 'match_id', 'match_team_points', 'match_team_comments'];
  protected $returnType = 'object';
}
