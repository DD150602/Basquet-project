<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Match Calendar Management</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FullCalendar CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/dist/fullcalendar.min.css" rel="stylesheet">
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
          <a href="#" class="nav-link text-dark py-2 active">Match Calendar</a>
          <a href="#" class="nav-link text-dark py-2">Settings</a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="col-md-9 col-lg-10 py-4">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Match Calendar Management</h2>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMatchModal">
            Add New Match
          </button>
        </div>

        <!-- Calendar -->
        <div id="calendar" class="mt-4"></div>

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
                  <input type="hidden" id="edit_match_id" name="match_id">

                  <!-- Match Date -->
                  <div class="mb-3">
                    <label for="edit_match_date" class="form-label">Match Date</label>
                    <input type="datetime-local" class="form-control" id="edit_match_date" name="match_date" required>
                  </div>

                  <!-- Teams -->
                  <div class="mb-3">
                    <label for="edit_team1" class="form-label">Team 1</label>
                    <select class="form-select" id="edit_team1" name="team1" required>
                      <option value="">Select Team</option>
                      <!-- Options dynamically populated -->
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="edit_team2" class="form-label">Team 2</label>
                    <select class="form-select" id="edit_team2" name="team2" required>
                      <option value="">Select Team</option>
                      <!-- Options dynamically populated -->
                    </select>
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
  <!-- FullCalendar JS -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/dist/fullcalendar.min.js"></script>

  <!-- Custom JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        editable: true,
        selectable: true,
        events: [
          // Example event
          {
            title: 'Match 1',
            start: '2024-09-15T14:00:00',
            extendedProps: {
              team1: 'Team A',
              team2: 'Team B'
            }
          }
        ],
        eventClick: function(info) {
          var matchId = info.event.id;
          // Populate and show the edit match modal
          // Load match data via AJAX or from info.event.extendedProps
          var editMatchModal = new bootstrap.Modal(document.getElementById('editMatchModal'));
          editMatchModal.show();
        }
      });
      calendar.render();
    });
  </script>
</body>

</html>