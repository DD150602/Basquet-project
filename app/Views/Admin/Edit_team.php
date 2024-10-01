<?php echo $this->extend('Templates/Layout'); ?>
<?php echo $this->section('content'); ?>
<?php
$session = session();
?>
<main class="container mt-5">
  <h2 class="text-center mb-5">Edit Team</h2>
  <div class="row">

    <!-- Section 1: Add/Remove Players -->
    <div class="col-md-6">
      <div class="border border-dark rounded p-4">
        <h4 class="text-center mb-4">Manage Players</h4>

        <!-- Form to Add Players to Team -->
        <?php echo form_open(); ?>
        <div class="row g-3">
          <div class="col-md-12 mb-3">
            <label for="player_select" class="form-label">Add Player</label>
            <select class="form-select" id="player_select" name="player_id" required>
              <option value="" disabled selected>Select a player</option>
              <?php //foreach ($players as $player): 
              ?>
              <option value="<?php //echo $player['player_id']; 
                              ?>"><?php //echo $player['player_name']; 
                                  ?></option>
              <?php //endforeach; 
              ?>
            </select>
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-dark">Add Player</button>
          </div>
        </div>
        <?php echo form_close(); ?>

        <hr class="my-4">

        <!-- Existing Players in the Team -->
        <h5 class="mb-3">Current Players</h5>
        <ul class="list-group mb-3">
          <?php //foreach ($team_players as $player): 
          ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php //echo $player['player_name']; 
            ?>
            <a href="<?php //echo site_url('team/remove_player/' . $team['team_id'] . '/' . $player['player_id']); 
                      ?>" class="btn btn-danger btn-sm">Remove</a>
          </li>
          <?php //endforeach; 
          ?>
        </ul>
      </div>
    </div>

    <!-- Section 2: Edit Team Information -->
    <div class="col-md-6">
      <div class="border border-dark rounded p-4">
        <h4 class="text-center mb-4">Team Information</h4>

        <?php echo form_open(); ?>
        <div class="row g-3">

          <!-- Team Name -->
          <div class="col-md-12 mb-3">
            <label for="team_name" class="form-label">Team Name</label>
            <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Enter team name" value="<?php //echo set_value('team_name', $team->team_name) ?>" required>
            <?php echo validation_show_error('team_name'); ?>
          </div>

          <!-- Team State (Active or Inactive) -->
          <div class="col-md-12 mb-3">
            <label for="team_state" class="form-label">Team State</label>
            <select class="form-select" id="team_state" name="team_state" required>
              <option value="active" <?php //echo $team->team_state == 'active' ? 'selected' : ''; ?>>Active</option>
              <option value="inactive" <?php //echo $team->team_state == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
            </select>
          </div>

          <!-- Sanction Status -->
          <div class="col-md-12 mb-3">
            <label for="team_sanction" class="form-label">Sanction Status</label>
            <select class="form-select" id="team_sanction" name="team_sanction">
              <option value="none" <?php //echo $team['team_sanction'] == 'none' ? 'selected' : ''; 
                                    ?>>None</option>
              <option value="sanctioned" <?php //echo $team['team_sanction'] == 'sanctioned' ? 'selected' : ''; 
                                          ?>>Sanctioned</option>
            </select>
          </div>

          <div class="col-12 text-center">
            <button type="submit" class="btn btn-dark">Update Team</button>
          </div>

        </div>
        <?php echo form_close(); ?>

      </div>
    </div>

  </div>
</main>
<?php echo $this->endSection(); ?>