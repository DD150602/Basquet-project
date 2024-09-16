<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <form>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
      </div>
      <div class="mb-3 form-check d-flex justify-content-between">
        <div>
          <input type="checkbox" class="form-check-input" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <a href="#" class="forgot-password">Forgot password?</a>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="register mt-3">
      <p>Don't have an account? <a href="#">Register here</a></p>
    </div>
    <div class="back-to-landing">
      <a href="<?php echo base_url(); ?>">← Back to Landing Page</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>