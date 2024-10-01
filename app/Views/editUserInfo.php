<?php echo $this->extend('Templates/Layout') ?>
<?php echo $this->section('content') ?>
<!-- Main form content -->
<main class="col-md-9 col-lg-10 p-4">
  <div class="container">
    <div class="row">

      <!-- Update User Info Section -->
      <div class="col-md-6">
        <div class="border border-dark rounded p-4">
          <h2 class="text-center mb-4">Update <?php echo session()->login_info['user_role']; ?> Info</h2>
          <?php echo form_open('updateAccount'); // Form action for updating user info 
          ?>
          <div class="row g-3">
            <div class="col-md-12 mb-3">
              <label for="user_name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter your first name" value="<?php echo set_value('user_name') ?>" required>
              <?php echo validation_show_error('user_name'); ?>
            </div>
            <div class="col-md-12 mb-3">
              <label for="user_lastname" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="user_lastname" name="user_lastname" placeholder="Enter your last name" value="<?php echo set_value('user_lastname') ?>" required>
              <?php echo validation_show_error('user_lastname'); ?>
            </div>
            <div class="col-md-12 mb-3">
              <label for="user_username" class="form-label">Username</label>
              <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Enter a username" value="<?php echo set_value('user_username') ?>" required>
              <?php echo validation_show_error('user_username'); ?>
            </div>
            <?php if (session()->login_info['user_role'] != 'Admin'): ?>
              <div class="col-md-12 mb-3">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter your email" value="<?php echo set_value('user_email') ?>" required>
                <?php echo validation_show_error('user_email'); ?>
              </div>
            <?php endif; ?>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-dark">Update Info</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>

      <!-- Change Password Section -->
      <div class="col-md-6">
        <div class="border border-dark rounded p-4">
          <h2 class="text-center mb-4">Change Password</h2>
          <?php echo form_open('changePassword'); // Form action to change password 
          ?>
          <div class="row g-3">
            <div class="col-md-12 mb-3">
              <label for="old_user_password" class="form-label">Current Password</label>
              <input type="password" class="form-control" id="old_user_password" name="old_user_password" placeholder="Enter your current password" value="<?php echo set_value('old_user_password') ?>">
              <?php echo validation_show_error('old_user_password'); ?>
            </div>
            <div class="col-md-12 mb-3">
              <div class="col-md-12 mb-3">
                <label for="user_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter a new password" value="<?php echo set_value('user_password') ?>">
                <?php echo validation_show_error('user_password'); ?>
              </div>
              <div class="col-md-12 mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" value="<?php echo set_value('confirm_password') ?>">
                <?php echo validation_show_error('confirm_password'); ?>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-dark">Update Password</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>

      </div>

      <!-- Show Delete Button if user role is not 'Admin' -->
      <?php if (session()->login_info['user_role'] == 'Admin'): ?>
        <div class="text-center mt-5">
          <button type="button" class="btn btn-danger">Delete Account</button>
        </div>
      <?php endif; ?>
    </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    let message = <?php echo session('message') ?>

    if (message === 1) {
      Swal.fire({
        icon: 'success',
        title: 'The update have been succesful',
        text: 'the information has been updated'
      })
    } else if (message === 2) {
      Swal.fire({
        icon: 'error',
        title: 'The update have failed',
        text: 'Check the information you have entered'
      })
    } else if (message === 3) {
      Swal.fire({
        icon: 'error',
        title: 'The current password is incorrect',
        text: 'Check your current password'
      })
    }
  })
</script>
<?php echo $this->endSection() ?>