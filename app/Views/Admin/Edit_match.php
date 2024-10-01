<?php $this->extend('Templates/Layout'); ?>
<?php $this->section('content'); ?>

<main class="container mt-5">
  <h2 class="text-center mb-5">Edit Match</h2>
  <div class="row">

    <!-- Section 1: Add/Remove Teams -->
    <div class="col-md-6">
      <div class="border border-dark rounded p-4">
        <h4 class="text-center mb-4">Add Teams to Match</h4>

        <!-- Form to Add Teams to Match -->
        <?php echo form_open('/admin/tournaments/addTeamsToMatch'); ?>
        <div class="row g-3">
          <input type="hidden" name="match_id" value="<?php echo $match->match_id; ?>">
          <div class="col-md-12 mb-3">
            <label for="team_select" class="form-label">Add Team</label>
            <select class="form-select" id="team_select" name="team_id">
              <option value="" disabled selected>Select a team</option>
              <?php foreach ($teams as $team): ?>
                <option value="<?php echo $team->team_id; ?>"><?php echo $team->team_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label for="match_team_points" class="form-label">Team's Points</label>
            <input class="form-control" type="number" id="match_team_points" name="match_team_points" value="<?php echo set_value('match_team_points', 0); ?>">
          </div>
          <div class="col-md-12 mb-3">
            <label for="match_team_comments" class="form-label">Team's comments</label>
            <input class="form-control" type="text" id="match_team_comments" name="match_team_comments" value="<?php echo set_value('match_team_comments'); ?>">
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-dark">Add Team</button>
          </div>
        </div>
        <?php echo form_close(); ?>

        <hr class="my-4">

        Existing Teams in Match
        <h5 class="mb-3">Current Teams</h5>
        <ul class="list-group mb-3">
          <?php foreach ($teamsInMatch as $team): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center ">
              <p class="mb-0"><?php echo $team->team_name; ?></p>
              <a href="<?php ?>" class="btn btn-danger btn-sm">Remove</a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- Section 2: Edit Match Details -->
    <div class="col-md-6">
      <div class="border border-dark rounded p-4">
        <h4 class="text-center mb-4">Match Details</h4>

        <?php echo form_open('match/update/' . $match->match_id); ?>
        <div class="row g-3">

          <!-- Match Date -->
          <div class="col-md-6 mb-3">
            <label for="match_date" class="form-label">Match Date</label>
            <input type="date" class="form-control" id="match_date" name="match_date" value="<?php echo set_value('match_date', $match->match_date); ?>" required>
          </div>

          <!-- Match Hour -->
          <div class="col-md-6 mb-3">
            <label for="match_hour" class="form-label">Match Hour</label>
            <input type="time" class="form-control" id="match_hour" name="match_hour" value="<?php echo set_value('match_hour', $match->match_hour); ?>" required>
          </div>

          <!-- Match Status -->
          <div class="col-md-12 mb-3">
            <label for="match_status" class="form-label">Match Status</label>
            <textarea name="match_status" id="match_status" class="form-control" rows="3" required></textarea>
          </div>

          <!-- Match Result -->
          <div class="col-md-12 mb-3">
            <label for="match_result" class="form-label">Match Result</label>
            <input type="text" class="form-control" id="match_result" name="match_result" placeholder="Enter result (e.g. 2-1)" value="<?php echo set_value('match_result'); ?>">
          </div>

          <div class="col-12 text-center">
            <button type="submit" class="btn btn-dark">Update Match</button>
          </div>

        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    let message = <?php echo session('message') ?>

    if (message === 1) {
      Swal.fire({
        icon: 'success',
        title: 'Match updated successfully',
        text: 'Team added successfully'
      })
    } else if (message === 2) {
      Swal.fire({
        icon: 'error',
        title: 'Max amount of teams reached',
        text: 'A match can only have two teams'
      })
    } else if (message === 3) {
      Swal.fire({
        icon: 'error',
        title: 'Team already in match',
        text: 'This team is already in the match and cannot be added again'
      })
    }
  })
</script>

<?php echo $this->endSection(); ?>