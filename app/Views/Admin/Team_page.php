<?php echo $this->extend('Templates/Layout'); ?>
<?php echo $this->section('content'); ?>
<!-- Main Content -->
<main class="col-md-9 col-lg-10 p-4">
  <?php echo $this->include('Templates/Components/Topbar'); ?>

  <div class="d-flex justify-content-between align-items-center">
    <h2>Teams Management</h2>
    <!-- Button to add a new team -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeamModal">
      Add New Team
    </button>
  </div>

  <!-- Teams list as cards -->
  <section class="row mt-4">
    <!-- Example team card -->
    <?php if (!empty($teams)) : ?>
      <?php foreach ($teams as $team) : ?>
        <article class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title"><?php echo $team->team_name; ?></h5>
              <p class="card-text">
                <strong>Members:</strong> 11<br>
                <strong>Status:</strong> <?php echo $team->team_state ? 'Active' : 'Inactive'; ?><br>
              </p>
              <!-- Button to manage team modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTeamModal" data-team-id="1">
                Manage Team
              </button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-center">No teams found.</p>
    <?php endif; ?>

    <!-- Repeat above card for each team dynamically -->
  </section>

  <!-- Add Team Modal -->
  <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTeamModalLabel">Add New Team</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo form_open('/admin/createTeam', ['id' => 'addTeamForm']); ?>
          <!-- Team Name -->
          <div class="mb-3">
            <label for="team_name" class="form-label">Team Name</label>
            <input type="text" class="form-control" id="team_name" name="team_name" required>`
          </div>

          <button type="submit" class="btn btn-primary">Create Team</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Team Modal -->
  <div class="modal fade" id="editTeamModal" tabindex="-1" aria-labelledby="editTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editTeamModalLabel">Edit Team Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/team/edit" method="post" id="editTeamForm">
            <!-- Team ID (hidden) -->
            <input type="hidden" id="team_id" name="team_id">

            <!-- Team Name -->
            <div class="mb-3">
              <label for="edit_team_name" class="form-label">Team Name</label>
              <input type="text" class="form-control" id="edit_team_name" name="team_name" required>
            </div>

            <!-- Team Status -->
            <div class="mb-3">
              <label for="edit_team_status" class="form-label">Team Status</label>
              <select class="form-select" id="edit_team_status" name="team_status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</main>
<?php $this->endSection(); ?>