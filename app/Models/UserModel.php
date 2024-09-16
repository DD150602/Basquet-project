<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'user_id';
  protected $useAutoIncrement = true;
  protected $returnType = 'object';
  protected $allowedFields = ['user_name', 'user_lastname', 'user_email', 'user_username', 'user_password', 'user_role_id', 'user_state', 'user_annotation'];

  public function getAllUsers()
  {
    return $this->select('user_name, user_lastname, user_email, user_username, role_name, user_username')
      ->join('roles', 'users.user_role_id = roles.role_id')
      ->where('user_state', true)
      ->findAll();
  }

  public function getUserById($id)
  {
    return $this->select('user_name, user_lastname, user_email, user_username, role_name, user_username')
      ->join('roles', 'users.user_role_id = roles.role_id')
      ->where('user_id', $id)
      ->where('user_state', true)
      ->find();
  }

  public function createUser($data)
  {
    $hashedPassword = password_hash($data['user_password'], PASSWORD_BCRYPT, ['cost' => 10]);
    $data['user_password'] = $hashedPassword;
    $this->insert($data);
  }

  public function updateUser($data)
  {
    $this->where('user_id', $data['user_id']);
    $this->update($data);
  }

  public function deactivateUser($data)
  {
    $this->where('user_id', $data['user_id']);
    $this->update($data);
  }
}
