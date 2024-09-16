<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS (optional) -->
  <style>
    body {
      display: flex;
      min-height: 100vh;
      overflow-x: hidden;
    }

    #sidebar {
      min-width: 250px;
      max-width: 250px;
      height: 100vh;
      background-color: #343a40;
      color: #fff;
    }

    #sidebar a {
      color: #fff;
      text-decoration: none;
    }

    #sidebar .nav-link.active {
      background-color: #007bff;
    }

    #main-content {
      flex-grow: 1;
      padding: 20px;
    }
  </style>
</head>

<body>

  <!-- Sidebar -->
  <aside class="col-md-3 col-lg-2 bg-light p-4 shadow-sm">
    <div class="d-flex align-items-center mb-4">
      <span class="fw-bold h5">B.T.S</span>
    </div>

    <nav class="nav flex-column">
      <!-- Dashboard -->
      <a href="#" class="nav-link text-dark py-2">Dashboard</a>

      <!-- Tournaments -->
      <a href="<?php echo base_url('/admin/tournaments') ?>" class="nav-link text-dark py-2 active">Tournaments</a>

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
  <div id="main-content">

    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
          </ul>
          <span class="navbar-text">
            Welcome, Admin
          </span>
        </div>
      </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-header">
              Card 1
            </div>
            <div class="card-body">
              <p class="card-text">This is a simple card with some text inside.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card mb-4">
            <div class="card-header">
              Card 2
            </div>
            <div class="card-body">
              <p class="card-text">This is another simple card with more text inside.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Full Width Card
            </div>
            <div class="card-body">
              <p class="card-text">This card spans the full width of its parent container. You can put a lot more content here.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>