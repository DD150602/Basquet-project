<?php
$this->extend('Templates/Layout');
$this->section('content');
?>
<!-- Main Content -->
<main class="col-md-9 col-lg-10 p-4">
  <h2>Results Tracking</h2>

  <!-- Match Results -->
  <section class="row">
    <!-- Example Match Card -->
    <article class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Match 1</h5>
          <p class="card-text">Team A vs Team B</p>
          <p class="card-text">Score: 2 - 1</p>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editResultModal">
            Show Details
          </button>
        </div>
      </div>
    </article>
    <!-- Repeat match cards as needed -->
  </section>

  <!-- Edit Result Modal -->
  <div class="modal fade" id="editResultModal" tabindex="-1" aria-labelledby="editResultModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editResultModalLabel">Edit Match Result</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/result/edit" method="post" id="editResultForm">
            <!-- Match ID (hidden) -->
            <input type="hidden" id="edit_match_id" name="match_id">

            <!-- Score Inputs -->
            <div class="mb-3">
              <label for="edit_team1_score" class="form-label">Team 1 Score</label>
              <input type="number" class="form-control" id="edit_team1_score" name="team1_score" required>
            </div>

            <div class="mb-3">
              <label for="edit_team2_score" class="form-label">Team 2 Score</label>
              <input type="number" class="form-control" id="edit_team2_score" name="team2_score" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</main>
<?php $this->endSection(); ?>