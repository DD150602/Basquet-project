<?php echo $this->extend('Templates/Layout'); ?>
<?php echo $this->section('content'); ?>
<!-- Main Content -->
<main class="col-md-9 col-lg-10 p-4">
  <?php echo $this->include('Templates/Components/Topbar'); ?>
  <div class="d-flex justify-content-between align-items-center">
    <h2>Players Management</h2>
    <!-- Button to add a new player -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlayerModal">
      Add New Player
    </button>
  </div>

  <!-- Players list as cards -->
  <section class="row mt-4">
    <!-- Example player card -->
    <?php if (!empty($players)) : ?>
      <?php foreach ($players as $player) : ?>
        <article class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Player A</h5>
              <p class="card-text">
                <strong>Team:</strong> <?php echo $player->team_name; ?><br>
                <strong>Position:</strong> <?php echo $player->role_name; ?><br>
                <strong>Number:</strong> <?php echo $player->player_number; ?><br>
                <strong>Condition:</strong> <?php echo $player->player_condition; ?>
              </p>
              <!-- Button to manage player modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editPlayerModal" data-player-id="1">
                Manage Player
              </button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-center">No players found.</p>
    <?php endif; ?>

    <!-- Repeat above card for each player dynamically -->
  </section>

  <!-- Add Player Modal -->
  <div class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="addPlayerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPlayerModalLabel">Add New Player</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo form_open('/admin/createPlayer', ['id' => 'addPlayerForm']); ?>
          <!-- Player Name -->
          <div class="mb-3">
            <label for="player_name" class="form-label">Player Name</label>
            <input type="text" class="form-control" id="player_name" name="player_name" required>
          </div>

          <!-- Player Lastname -->
          <div class="mb-3">
            <label for="player_lastname" class="form-label">Player Lastname</label>
            <input type="text" class="form-control" id="player_lastname" name="player_lastname" required>
          </div>

          <!-- Team -->
          <div class="mb-3">
            <label for="player_team" class="form-label">Team</label>
            <select class="form-select" id="player_team" name="player_team" required>
              <?php foreach ($teams as $team) : ?>
                <option value="<?php echo $team->team_id; ?>"><?php echo $team->team_name; ?></option>
              <?php endforeach; ?>
              <!-- Add more team options dynamically -->
            </select>
          </div>

          <!-- Position -->
          <div class="mb-3">
            <label for="player_position" class="form-label">Position</label>
            <select type="text" class="form-select" id="player_position" name="player_position" required>
              <?php foreach ($roles as $role) : ?>
                <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Number -->
          <div class="mb-3">
            <label for="player_number" class="form-label">Number</label>
            <input type="number" class="form-control" id="player_number" name="player_number" required>
          </div>

          <!-- Condition -->
          <div class="mb-3">
            <label for="player_condition" class="form-label">Condition</label>
            <input type="text" class="form-control" id="player_condition" name="player_condition" required>
          </div>

          <button type="submit" class="btn btn-primary">Add Player</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Player Modal -->
  <div class="modal fade" id="editPlayerModal" tabindex="-1" aria-labelledby="editPlayerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editPlayerModalLabel">Edit Player Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/player/edit" method="post" id="editPlayerForm">
            <!-- Player ID (hidden) -->
            <input type="hidden" id="player_id" name="player_id">

            <!-- Player Name -->
            <div class="mb-3">
              <label for="edit_player_name" class="form-label">Player Name</label>
              <input type="text" class="form-control" id="edit_player_name" name="player_name" required>
            </div>

            <!-- Team -->
            <div class="mb-3">
              <label for="edit_player_team" class="form-label">Team</label>
              <select class="form-select" id="edit_player_team" name="player_team" required>
                <option value="team1">Team A</option>
                <option value="team2">Team B</option>
                <!-- Add more team options dynamically -->
              </select>
            </div>

            <!-- Position -->
            <div class="mb-3">
              <label for="edit_player_position" class="form-label">Position</label>
              <input type="text" class="form-control" id="edit_player_position" name="player_position" required>
            </div>

            <!-- Age -->
            <div class="mb-3">
              <label for="edit_player_age" class="form-label">Age</label>
              <input type="number" class="form-control" id="edit_player_age" name="player_age" required>
            </div>

            <!-- Number -->
            <div class="mb-3">
              <label for="edit_player_number" class="form-label">Number</label>
              <input type="number" class="form-control" id="edit_player_number" name="player_number" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</main>
<?php $this->endSection(); ?>