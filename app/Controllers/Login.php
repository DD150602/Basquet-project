<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    return view('Login');
  }

  public function login()
  {
    $rules = [
      'user_email' => [
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => 'The email field is required',
          'valid_email' => 'The email field must contain a valid email address'
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
      $data = [
        'user_email' => $this->request->getPost('user_email'),
        'user_password' => $this->request->getPost('user_password')
      ];

      $login_info = $this->userModel->login($data);
      print_r($login_info);

      if ($login_info['login'] && $login_info['user_role'] == 'Admin') {
        $this->session->set('login_info', $login_info);
        return redirect()->to('/admin');
      } else {
        $this->session->setFlashdata('message-error', $login_info['message']);
        return redirect()->to('/login');
      }
    }
  }

  public function logout()
  {
    $this->session->destroy();
    return redirect()->to('/login');
  }
}
