<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Torneos</title>
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
      <main class="col-md-9 col-lg-10 p-4">
        <h1 class="mb-4">Crear y Gestionar Torneos</h1>
        <div class="d-flex justify-content-between mb-3">
          <h2>Tournaments</h2>
          <!-- Button to trigger Add Tournament modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTournamentModal">
            Add Tournament
          </button>
        </div>

        <!-- Tournaments list as cards -->
        <div class="row">
          <!-- Example tournament card -->
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Tournament Name</h5>
                <p class="card-text">
                  <strong>Description:</strong> Tournament Description<br>
                  <strong>Start Date:</strong> 2024-09-01<br>
                  <strong>End Date:</strong> 2024-09-30<br>
                  <strong>Teams:</strong> 16<br>
                  <strong>Status:</strong> Ongoing
                </p>
                <a href="/torneo/1" class="btn btn-outline-primary">Go Inside the Tournament</a>
              </div>
            </div>
          </div>

          <!-- Repeat above card for each tournament fetched from backend -->
        </div>
      </main>
    </div>
  </div>

  <!-- Add Tournament Modal -->
  <div class="modal fade" id="addTournamentModal" tabindex="-1" aria-labelledby="addTournamentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTournamentModalLabel">Add Tournament</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/torneo/agregar" method="post" id="addTournamentForm">
            <!-- Tournament Name -->
            <div class="mb-3">
              <label for="nombre" class="form-label">Tournament Name</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
              <label for="descripcion" class="form-label">Description</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>

            <!-- Start Date -->
            <div class="mb-3">
              <label for="fecha_inicio" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>

            <!-- End Date -->
            <div class="mb-3">
              <label for="fecha_fin" class="form-label">End Date</label>
              <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
            </div>

            <!-- Number of Teams -->
            <div class="mb-3">
              <label for="cantidad_equipos" class="form-label">Number of Teams</label>
              <input type="number" class="form-control" id="cantidad_equipos" name="cantidad_equipos" min="2" required>
            </div>

            <!-- Tournament Status -->
            <div class="mb-3">
              <label for="estado" class="form-label">Tournament Status</label>
              <select class="form-select" id="estado" name="estado" required>
                <option value="pendiente">Pending</option>
                <option value="en_progreso">Ongoing</option>
                <option value="finalizado">Completed</option>
              </select>
            </div>

            <!-- Tournament Type -->
            <div class="mb-3">
              <label for="tipo" class="form-label">Tournament Type</label>
              <select class="form-select" id="tipo" name="tipo" required>
                <option value="eliminacion_simple">Single Elimination</option>
                <option value="eliminacion_doble">Double Elimination</option>
                <option value="liguilla">Round Robin</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Tournament</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>