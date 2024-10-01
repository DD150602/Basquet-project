<?php
$this->extend('Templates/Layout');
$this->section('content');
?>
<!-- Main Content -->
<main class="col-md-9 col-lg-10 p-4">
  <?php echo $this->include('Templates/Components/Topbar'); ?>
  <div class="d-flex justify-content-between align-items-center">
    <h2>Referees Management</h2>
    <!-- Button to add a new referee -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRefereeModal">
      Add New Referee
    </button>
  </div>

  <!-- Referees list as cards -->
  <section class="row mt-4">
    <!-- Example referee card -->
    <?php if (!empty($referees)) : ?>
      <?php foreach ($referees as $referee) : ?>
        <article class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title"><?php echo $referee['referee_name']; ?></h5>
              <p class="card-text">
                <strong>Matches Officiated:</strong> <?php echo $referee['matches_count']; ?>
              </p>
              <!-- Button to manage referee modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editRefereeModal" data-referee-id="1">
                Manage Referee
              </button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-center">No referees found.</p>
    <?php endif; ?>

    <!-- Repeat above card for each referee dynamically -->
  </section>

  <!-- Add Referee Modal -->
  <div class="modal fade" id="addRefereeModal" tabindex="-1" aria-labelledby="addRefereeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRefereeModalLabel">Add New Referee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          $attributes = ['id' => 'addRefereeForm'];
          echo form_open('/admin/createReferee', $attributes); ?>
          <!-- Referee Name -->
          <div class="mb-3">
            <label for="referee_name" class="form-label">Referee Name</label>
            <input type="text" class="form-control" id="referee_name" name="referee_name" required>
          </div>

          <button type="submit" class="btn btn-primary">Add Referee</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Referee Modal -->
  <div class="modal fade" id="editRefereeModal" tabindex="-1" aria-labelledby="editRefereeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRefereeModalLabel">Edit Referee Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/referee/edit" method="post" id="editRefereeForm">
            <!-- Referee ID (hidden) -->
            <input type="hidden" id="referee_id" name="referee_id">

            <!-- Referee Name -->
            <div class="mb-3">
              <label for="edit_referee_name" class="form-label">Referee Name</label>
              <input type="text" class="form-control" id="edit_referee_name" name="referee_name" required>
            </div>

            <!-- Qualification -->
            <div class="mb-3">
              <label for="edit_referee_qualification" class="form-label">Qualification</label>
              <input type="text" class="form-control" id="edit_referee_qualification" name="referee_qualification" required>
            </div>

            <!-- Experience -->
            <div class="mb-3">
              <label for="edit_referee_experience" class="form-label">Experience (years)</label>
              <input type="number" class="form-control" id="edit_referee_experience" name="referee_experience" required>
            </div>

            <!-- Matches Officiated -->
            <div class="mb-3">
              <label for="edit_referee_matches" class="form-label">Matches Officiated</label>
              <input type="number" class="form-control" id="edit_referee_matches" name="referee_matches" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</main>
<?php $this->endSection(); ?>