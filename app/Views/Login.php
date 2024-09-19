<?php
$session = session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="<?php echo base_url('Resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      padding: 15px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      border-radius: 0.5rem;
    }

    .login-title {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 30px;
    }

    .btn-primary {
      width: 100%;
      border-radius: 0.5rem;
    }

    .form-check-label {
      font-size: 14px;
    }

    .forgot-password {
      text-align: center;
      margin-top: 10px;
    }

    .register {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2 class="login-title">Login</h2>
    <?php if ($session->getFlashdata('message-error')): ?>
      <div class="alert alert-danger">
        <?php echo $session->getFlashdata('message-error'); ?>
      </div>
    <?php endif; ?>
    <?php echo form_open('login-in'); ?>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter your email" value="<?php echo set_value('user_email'); ?>">
      <?php echo validation_show_error('user_email'); ?>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter your password" value="<?php echo set_value('user_password'); ?>">
      <?php echo validation_show_error('user_password'); ?>
    </div>
    <div class="mb-3 form-check d-flex justify-content-between">
      <div>
        <input type="checkbox" class="form-check-input" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
      </div>
      <a href="#" class="forgot-password">Forgot password?</a>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <?php echo form_close(); ?>
    <div class="register mt-3">
      <p>Don't have an account? <a href="<?php echo base_url('createAcount'); ?>">Register here</a></p>
    </div>
    <div class="back-to-landing">
      <a href="<?php echo base_url(); ?>">← Back to Landing Page</a>
    </div>
  </div>

  <script src="<?php echo base_url('Resources/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>