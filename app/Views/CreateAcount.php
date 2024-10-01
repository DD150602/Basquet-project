<?php
$session = session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url('Resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!-- User creation form card -->
    <div class="card shadow-lg p-4" style="max-width: 700px; width: 100%;">
      <h2 class="text-center mb-4">Create New User</h2>
      <?php if ($session->getFlashdata('message')): ?>
        <div class="alert alert-danger">
          <?php echo $session->getFlashdata('message'); ?>
        </div>
      <?php endif; ?>

      <?php echo form_open('createAcount'); ?>

      <!-- Grid-based form layout -->
      <div class="row">
        <!-- First Name -->
        <div class="col-md-6 mb-3">
          <label for="user_name" class="form-label">First Name</label>
          <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter first name" required>
          <?php echo validation_show_error('user_name'); ?>
        </div>

        <!-- Last Name -->
        <div class="col-md-6 mb-3">
          <label for="user_lastname" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Enter last name" required>
          <?php echo validation_show_error('user_lastname'); ?>
        </div>
      </div>

      <div class="row">
        <!-- Email -->
        <div class="col-md-6 mb-3">
          <label for="user_email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter email address" required>
          <?php echo validation_show_error('user_email'); ?>
        </div>

        <!-- Username -->
        <div class="col-md-6 mb-3">
          <label for="user_username" class="form-label">Username</label>
          <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Enter username" required>
          <?php echo validation_show_error('user_username'); ?>
        </div>
      </div>

      <div class="row">
        <!-- Password -->
        <div class="col-md-12 mb-3">
          <label for="user_password" class="form-label">Password</label>
          <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter password" required>
          <?php echo validation_show_error('user_password'); ?>
        </div>
      </div>

      <!-- Submit button -->
      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">Create User</button>
      </div>
      <?php echo form_close(); ?>

      <!-- Additional buttons for Landing and Login pages -->
      <div class="d-flex justify-content-between">
        <a href="<?php echo base_url(); ?>"> ← Go to Landing Page</a>
        <a href="<?php echo base_url('login'); ?>">Go to Login →</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="<?php echo base_url('Resources/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>