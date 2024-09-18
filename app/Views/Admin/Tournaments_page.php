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
    <!-- Example tournament card -->
    <article class="col-md-4">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Tournament Name</h5>
          <p class="card-text">
            <strong>Description:</strong> Tournament Description<br>
            <strong>Start Date:</strong> 2024-09-01<br>
            <strong>End Date:</strong> 2024-09-30<br>
            <strong>Status:</strong> Ongoing
          </p>
          <a href="<?php echo base_url('/admin/tournaments/insideTournaments'); ?>" class="btn btn-outline-primary">Go Inside the Tournament</a>
        </div>
      </div>
    </article>

    <!-- Repeat above card for each tournament fetched from backend -->
  </section>
</main>
</div>
</div>

<!-- Add Tournament Modal -->
<div class="modal fade" id="addTournamentModal" tabindex="-1" aria-labelledby="addTournamentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTournamentModalLabel">Add Tournament</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/torneo/agregar" method="post" id="addTournamentForm">
          <!-- Tournament Name -->
          <div class="mb-3">
            <label for="nombre" class="form-label">Tournament Name</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>

          <!-- Start Date -->
          <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
          </div>

          <!-- End Date -->
          <div class="mb-3">
            <label for="fecha_fin" class="form-label">End Date</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
          </div>

          <!-- Tournament Status -->
          <div class="mb-3">
            <label for="estado" class="form-label">Tournament Status</label>
            <select class="form-select" id="estado" name="estado" required>
              <option value="pendiente">Pending</option>
              <option value="en_progreso">Ongoing</option>
              <option value="finalizado">Completed</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Add Tournament</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection(); ?>