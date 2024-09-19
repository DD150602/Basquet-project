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

  public function login($data)
  {
    $user = $this->select('user_username, role_name, user_password, user_id')
      ->join('roles', 'users.user_role_id = roles.role_id')
      ->where('user_email', $data['user_email'])
      ->where('user_state', true)
      ->first();

    if (!$this->validateEmail($data['user_email'])) {
      return [
        'login' => false,
        'message' => 'El email no se encuentra registrado'
      ];
    }

    if (password_verify($data['user_password'], $user->user_password)) {
      return [
        'user_id' => $user->user_id,
        'user_username' => $user->user_username,
        'user_role' => $user->role_name,
        'login' => true
      ];
    } else {
      return [
        'login' => false,
        'message' => 'Contraseña incorrecta'
      ];
    }
  }

  private function validateEmail($email)
  {
    $user = $this->where('user_email', $email)
      ->where('user_state', true)
      ->findAll();

    if ($user) {
      return true;
    } else {
      return false;
    }
  }

  private function validateUsername($username)
  {
    $user = $this->where('user_username', $username)
      ->where('user_state', true)
      ->findAll();

    if ($user) {
      return true;
    } else {
      return false;
    }
  }
}
