<?php echo $this->extend('Templates/Layout'); ?>
<?php echo $this->section('content'); ?>
<?php
$session = session();
?>
<!-- Main Content -->
<main class="col-md-9 col-lg-10 p-4">
  <?php echo $this->include('Templates/Components/Topbar'); ?>
  <div class="d-flex justify-content-between align-items-center">
    <h2>Tournament: <span id="tournament-name"><?php echo $tournament->tournament_name; ?></span></h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMatchModal">
      Add New Match
    </button>
  </div>
  <?php if ($session->getFlashdata('message')): ?>
    <div class="alert alert-danger">
      <?php echo $session->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>

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
              <a type="button" class="btn btn-outline-primary" href="<?php echo base_url('/admin/tournaments/editMatch/' . $match->match_id); ?>">Show Details</a>
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

        <?php
        $attributes = ['id' => 'addMatchForm'];
        echo form_open('/admin/tournaments/createMatch', $attributes);
        ?>

        <input type="hidden" name="tournament_id" value="<?php echo $tournament->tournament_id; ?>">

        <!-- Match Date -->
        <div class="mb-3">
          <label for="match_date" class="form-label">Match Date</label>
          <input type="datetime-local" class="form-control" id="match_date" name="match_date" required>
        </div>

        <div class="mb-3">
          <label for="match_description" class="form-label">Match Description</label>
          <textarea type="text" class="form-control" id="match_description" name="match_description" placeholder="Match Description" required></textarea>
        </div>

        <!-- Teams -->
        <div class="mb-3">
          <label for="referees" class="form-label">Referees</label>
          <select class="form-select" id="referees" name="referees" required>
            <option value="">Select Referees</option>
            <?php foreach ($referees as $referee) : ?>
              <option value="<?php echo $referee['referee_id']; ?>"><?php echo $referee['referee_name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Match</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection(); ?>