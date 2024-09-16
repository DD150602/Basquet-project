  <!-- Sidebar -->
  <aside class="col-md-3 col-lg-2 bg-light p-4 shadow-sm">
    <div class="d-flex align-items-center mb-4">
      <span class="fw-bold h5">B.T.S</span>
    </div>

    <nav class="nav flex-column">
      <!-- Dashboard -->
      <a href="<?php echo base_url('/admin') ?>" class="nav-link text-dark py-2">Dashboard</a>

      <!-- Tournaments -->
      <a href="<?php echo base_url('/admin/tournaments') ?>" class="nav-link text-dark py-2 active">Tournaments</a>

      <!-- Teams -->
      <a href="<?php echo base_url('/admin/teams') ?>" class="nav-link text-dark py-2">Teams</a>

      <!-- Players -->
      <a href="<?php echo base_url('/admin/players') ?>" class="nav-link text-dark py-2">Players</a>

      <!-- Referees -->
      <a href="<?php echo base_url('/admin/referees') ?>" class="nav-link text-dark py-2">Referees</a>

      <!-- Settings -->
      <a href="<?php echo base_url('/admin/settings') ?>" class="nav-link text-dark py-2">Settings</a>
    </nav>
  </aside>