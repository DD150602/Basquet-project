<?php

namespace App\Controllers;

use App\Models\UserModel;

class CreateAcount extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    return view('CreateAcount');
  }

  public function createAcount()
  {
    $rules = [
      'user_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'The first name field is required'
        ]
      ],
      'user_lastname' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'The last name field is required'
        ]
      ],
      'user_email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'The email field is required',
          'valid_email' => 'The email field must contain a valid email address'
        ]
      ],
      'user_username' => [
        'rules' => 'required|is_unique[users.user_username]',
        'errors' => [
          'required' => 'The username field is required',
          'is_unique' => 'The username field must be unique'
        ]
      ],
      'user_password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'The password field is required'
        ]
      ]
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput();
    } else {
      $data = $this->request->getPost();
      $create = $this->userModel->createUser($data);
      if ($create['create']) {
        return redirect()->to('/login')->with('message', $create['message']);
      } else {
        return redirect()->to('/createAcount')->with('message', $create['message']);
      }
    }
  }
}
