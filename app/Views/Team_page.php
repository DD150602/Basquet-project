<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Teams</title>
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

          <!-- Teams (Active) -->
          <a href="#" class="nav-link text-dark py-2 active">Teams</a>

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
        <div class="d-flex justify-content-between align-items-center">
          <h2>Teams Management</h2>
          <!-- Button to add a new team -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeamModal">
            Add New Team
          </button>
        </div>

        <!-- Teams list as cards -->
        <div class="row mt-4">
          <!-- Example team card -->
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Team A</h5>
                <p class="card-text">
                  <strong>Members:</strong> 11<br>
                  <strong>Status:</strong> Active<br>
                  <strong>Coach:</strong> John Doe<br>
                  <strong>Established:</strong> 2020
                </p>
                <!-- Button to manage team modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTeamModal" data-team-id="1">
                  Manage Team
                </button>
              </div>
            </div>
          </div>

          <!-- Repeat above card for each team dynamically -->
        </div>

        <!-- Add Team Modal -->
        <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addTeamModalLabel">Add New Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="/team/add" method="post" id="addTeamForm">
                  <!-- Team Name -->
                  <div class="mb-3">
                    <label for="team_name" class="form-label">Team Name</label>
                    <input type="text" class="form-control" id="team_name" name="team_name" required>
                  </div>

                  <!-- Team Status -->
                  <div class="mb-3">
                    <label for="team_status" class="form-label">Team Status</label>
                    <select class="form-select" id="team_status" name="team_status" required>
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                    </select>
                  </div>

                  <!-- Coach Name -->
                  <div class="mb-3">
                    <label for="team_coach" class="form-label">Coach</label>
                    <input type="text" class="form-control" id="team_coach" name="team_coach" required>
                  </div>

                  <!-- Established Year -->
                  <div class="mb-3">
                    <label for="team_established" class="form-label">Established Year</label>
                    <input type="number" class="form-control" id="team_established" name="team_established" required>
                  </div>

                  <button type="submit" class="btn btn-primary">Create Team</button>
                </form>
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

                  <!-- Coach Name -->
                  <div class="mb-3">
                    <label for="edit_team_coach" class="form-label">Coach</label>
                    <input type="text" class="form-control" id="edit_team_coach" name="team_coach" required>
                  </div>

                  <!-- Established Year -->
                  <div class="mb-3">
                    <label for="edit_team_established" class="form-label">Established Year</label>
                    <input type="number" class="form-control" id="edit_team_established" name="team_established" required>
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