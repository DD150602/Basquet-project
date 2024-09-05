<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
  protected $table = 'roles';
  protected $primaryKey = 'role_id';
  protected $allowedFields = ['role_name'];
  protected $returnType = 'object';
  protected $useAutoIncrement = true;

  public function getAllRoles()
  {
    return $this->findAll();
  }

  public function createRole($data)
  {
    return $this->insert($data);
  }
}
