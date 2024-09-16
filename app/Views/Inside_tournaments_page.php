<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tournament Matches</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <aside class="col-md-3 col-lg-2 bg-light p-4 shadow-sm">
        <h4 class="mb-4">Panel de Administración</h4>
        <nav class="nav flex-column">
          <!-- Dashboard -->
          <a href="#" class="nav-link text-dark py-2">Dashboard</a>

          <!-- Tournaments -->
          <a href="#" class="nav-link text-dark py-2">Tournaments</a>

          <!-- Teams -->
          <a href="#" class="nav-link text-dark py-2">Teams</a>

          <!-- Players -->
          <a href="#" class="nav-link text-dark py-2">Players</a>

          <!-- Referees -->
          <a href="#" class="nav-link text-dark py-2">Referees</a>

          <!-- Settings -->
          <a href="#" class="nav-link text-dark py-2">Settings</a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="col-md-9 col-lg-10 py-4">
        <h2>Tournament: <span id="tournament-name">Tournament Name</span></h2>

        <!-- Matches list as cards -->
        <div class="row mt-4">
          <!-- Example match card -->
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Match 1: Team A vs Team B</h5>
                <p class="card-text">
                  <strong>Date:</strong> 2024-09-01<br>
                  <strong>Time:</strong> 15:00<br>
                  <strong>Status:</strong> Completed<br>
                  <strong>Result:</strong> Team A 2 - 1 Team B
                </p>
                <!-- Button to trigger Edit Match modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editMatchModal" data-match-id="1">
                  Show Details
                </button>
              </div>
            </div>
          </div>

          <!-- Repeat above card for each match dynamically -->
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

      </main>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>