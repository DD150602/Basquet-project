<?php echo $this->extend('Templates/Layout'); ?>
<?php echo $this->section('content'); ?>
<!-- Main Content -->
<main class="col-md-9 col-lg-10 p-4">
  <?php echo $this->include('Templates/Components/Topbar'); ?>
  <div class="d-flex justify-content-between align-items-center">
    <h2>Tournament: <span id="tournament-name"><?php echo $tournament->tournament_name; ?></span></h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMatchModal">
      Add New Match
    </button>
  </div>

  <!-- Matches list as cards -->
  <section class="row mt-4">
    <!-- Example match card -->
    <?php if (!empty($matchesTournament)) : ?>
      <?php foreach ($matchesTournament as $match) : ?>
        <article class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">Match <?php echo $match->match_id; ?>: Team A vs Team B</h5>
              <p class="card-text">
                <strong>Date:</strong> <?php echo $match->match_date; ?><br>

                <strong>Time:</strong> <?php echo $match->match_hour; ?><br>
                <strong>Result:</strong> <?php echo $match->match_description; ?>
              </p>

              <!-- Button to trigger Edit Match modal -->
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editMatchModal" data-match-id="1">
                Show Details
              </button>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    <?php else : ?>
      <p class="text-center">No matches found.</p>
    <?php endif; ?>
  </section>
</main>

<!-- Add Match Modal -->
<div class="modal fade" id="addMatchModal" tabindex="-1" aria-labelledby="addMatchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMatchModalLabel">Add New Match</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/match/add" method="post" id="addMatchForm">
          <!-- Match Date -->
          <div class="mb-3">
            <label for="match_date" class="form-label">Match Date</label>
            <input type="datetime-local" class="form-control" id="match_date" name="match_date" required>
          </div>

          <!-- Teams -->
          <div class="mb-3">
            <label for="team1" class="form-label">Team 1</label>
            <select class="form-select" id="team1" name="team1" required>
              <option value="">Select Team</option>
              <!-- Options dynamically populated -->
            </select>
          </div>

          <div class="mb-3">
            <label for="team2" class="form-label">Team 2</label>
            <select class="form-select" id="team2" name="team2" required>
              <option value="">Select Team</option>
              <!-- Options dynamically populated -->
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Add Match</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Match Modal -->
<div class="modal fade" id="editMatchModal" tabindex="-1" aria-labelledby="editMatchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMatchModalLabel">Edit Match Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/match/edit" method="post" id="editMatchForm">
          <!-- Match ID (hidden) -->
          <input type="hidden" id="match_id" name="match_id">

          <!-- Team A -->
          <div class="mb-3">
            <label for="team_a" class="form-label">Team A</label>
            <input type="text" class="form-control" id="team_a" name="team_a" required>
          </div>

          <!-- Team B -->
          <div class="mb-3">
            <label for="team_b" class="form-label">Team B</label>
            <input type="text" class="form-control" id="team_b" name="team_b" required>
          </div>

          <!-- Date -->
          <div class="mb-3">
            <label for="match_date" class="form-label">Match Date</label>
            <input type="date" class="form-control" id="match_date" name="match_date" required>
          </div>

          <!-- Time -->
          <div class="mb-3">
            <label for="match_time" class="form-label">Match Time</label>
            <input type="time" class="form-control" id="match_time" name="match_time" required>
          </div>

          <!-- Match Status -->
          <div class="mb-3">
            <label for="match_status" class="form-label">Match Status</label>
            <select class="form-select" id="match_status" name="match_status" required>
              <option value="pending">Pending</option>
              <option value="ongoing">Ongoing</option>
              <option value="completed">Completed</option>
            </select>
          </div>

          <!-- Result -->
          <div class="mb-3">
            <label for="match_result" class="form-label">Result</label>
            <input type="text" class="form-control" id="match_result" name="match_result">
          </div>

          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection(); ?>