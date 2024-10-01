<?php echo $this->extend('Templates/Layout'); ?>
<?php echo $this->section('content'); ?>
<!-- Main Content -->
<main class="col-md-9 col-lg-10 p-4">
  <?php echo $this->include('Templates/Components/Topbar'); ?>
  <h1 class="mb-4">Create and Manage Tournaments</h1>
  <div class="d-flex justify-content-between mb-3">
    <h2>Tournaments</h2>
    <!-- Button to trigger Add Tournament modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTournamentModal">
      Add Tournament
    </button>
  </div>

  <!-- Tournaments list as cards -->
  <section class="row">
    <?php if (!empty($tournaments)) : ?>
      <?php foreach ($tournaments as $tournament) : ?>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title"><?php echo $tournament->tournament_name; ?></h5>
              <p class="card-text">
                <strong>Start Date:</strong> <?php echo $tournament->tournament_start_date; ?><br>
                <strong>End Date:</strong> <?php echo $tournament->tournament_end_date; ?><br>
                <strong>Status:</strong> <?php echo $tournament->tournament_state; ?>
              </p>
              <a href="<?php echo base_url('/admin/tournaments/insideTournaments/' . $tournament->tournament_id); ?>" class="btn btn-outline-primary">Go Inside the Tournament</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-center">No tournaments found.</p>
    <?php endif; ?>
  </section>
</main>

<!-- Add Tournament Modal -->
<div class="modal fade" id="addTournamentModal" tabindex="-1" aria-labelledby="addTournamentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTournamentModalLabel">Add Tournament</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        $attributes = ['class' => 'tournament_form', 'id' => 'addTournamentForm'];
        echo form_open('admin/tournaments/create', $attributes);
        ?>
        <!-- Tournament Name -->
        <div class="mb-3">
          <label for="nombre" class="form-label">Tournament Name</label>
          <input type="text" class="form-control" id="tournament_name" name="tournament_name" required>
        </div>

        <!-- Start Date -->
        <div class="mb-3">
          <label for="tournament_start_date" class="form-label">Start Date</label>
          <input type="date" class="form-control" id="tournament_start_date" name="tournament_start_date" required>
        </div>

        <!-- End Date -->
        <div class="mb-3">
          <label for="tournament_end_date" class="form-label">End Date</label>
          <input type="date" class="form-control" id="tournament_end_date" name="tournament_end_date" required>
        </div>

        <!-- Tournament Status -->
        <div class="mb-3">
          <label for="tournament_state" class="form-label">Tournament Status</label>
          <select class="form-select" id="tournament_state" name="tournament_state" required>
            <option value="pendiente">Pending</option>
            <option value="en_progreso">Ongoing</option>
            <option value="finalizado">Completed</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Tournament</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection(); ?>