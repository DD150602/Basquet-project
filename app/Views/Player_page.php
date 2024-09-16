<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Players</title>
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

          <!-- Players (Active) -->
          <a href="#" class="nav-link text-dark py-2 active">Players</a>

          <!-- Referees -->
          <a href="#" class="nav-link text-dark py-2">Referees</a>

          <!-- Settings -->
          <a href="#" class="nav-link text-dark py-2">Settings</a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="col-md-9 col-lg-10 py-4">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Players Management</h2>
          <!-- Button to add a new player -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlayerModal">
            Add New Player
          </button>
        </div>

        <!-- Players list as cards -->
        <div class="row mt-4">
          <!-- Example player card -->
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Player A</h5>
                <p class="card-text">
                  <strong>Team:</strong> Team A<br>
                  <strong>Position:</strong> Forward<br>
                  <strong>Age:</strong> 25<br>
                  <strong>Number:</strong> 9
                </p>
                <!-- Button to manage player modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editPlayerModal" data-player-id="1">
                  Manage Player
                </button>
              </div>
            </div>
          </div>

          <!-- Repeat above card for each player dynamically -->
        </div>

        <!-- Add Player Modal -->
        <div class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="addPlayerModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addPlayerModalLabel">Add New Player</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="/player/add" method="post" id="addPlayerForm">
                  <!-- Player Name -->
                  <div class="mb-3">
                    <label for="player_name" class="form-label">Player Name</label>
                    <input type="text" class="form-control" id="player_name" name="player_name" required>
                  </div>

                  <!-- Team -->
                  <div class="mb-3">
                    <label for="player_team" class="form-label">Team</label>
                    <select class="form-select" id="player_team" name="player_team" required>
                      <option value="team1">Team A</option>
                      <option value="team2">Team B</option>
                      <!-- Add more team options dynamically -->
                    </select>
                  </div>

                  <!-- Position -->
                  <div class="mb-3">
                    <label for="player_position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="player_position" name="player_position" required>
                  </div>

                  <!-- Age -->
                  <div class="mb-3">
                    <label for="player_age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="player_age" name="player_age" required>
                  </div>

                  <!-- Number -->
                  <div class="mb-3">
                    <label for="player_number" class="form-label">Number</label>
                    <input type="number" class="form-control" id="player_number" name="player_number" required>
                  </div>

                  <button type="submit" class="btn btn-primary">Add Player</button>
                </form>
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
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>