<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Results Tracking</title>
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
          <a href="#" class="nav-link text-dark py-2">Dashboard</a>
          <a href="#" class="nav-link text-dark py-2">Tournaments</a>
          <a href="#" class="nav-link text-dark py-2">Teams</a>
          <a href="#" class="nav-link text-dark py-2">Players</a>
          <a href="#" class="nav-link text-dark py-2">Referees</a>
          <a href="#" class="nav-link text-dark py-2">Match Calendar</a>
          <a href="#" class="nav-link text-dark py-2 active">Results Tracking</a>
          <a href="#" class="nav-link text-dark py-2">Settings</a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="col-md-9 col-lg-10 py-4">
        <h2>Results Tracking</h2>

        <!-- Match Results -->
        <div class="row">
          <!-- Example Match Card -->
          <div class="col-md-4 mb-3">
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
          </div>
          <!-- Repeat match cards as needed -->
        </div>

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
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom JavaScript -->
  <script>
    // JavaScript to handle modal and form population if needed
  </script>
</body>

</html>