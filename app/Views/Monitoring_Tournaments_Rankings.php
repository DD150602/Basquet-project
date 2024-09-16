<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tournament Monitoring & Rankings</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<style>
  body {
    display: grid;
    min-height: 100dvh;
    grid-template-rows: auto 1fr auto;
    /* display: flex;
    flex-direction: row;
    min-height: 100vh; */
  }

  /* footer {
    margin-top: auto;
  } */
</style>

<body class="container-fluid">
  <!-- Header -->
  <header class="bg-primary text-white text-center py-3">
    <h1>Tournament Monitoring & Rankings</h1>
    <a href="<?php echo base_url(); ?>" class="btn btn-light mt-2">Go to Landing Page</a>
  </header>

  <!-- Main Content -->
  <main class="contenedor row mt-4">
    <!-- Tournaments Overview -->
    <section class="col-md-6 mb-4">
      <h2>Ongoing and Upcoming Tournaments</h2>
      <div class="list-group">
        <!-- Example Tournament Card -->
        <a href="#" class="list-group-item list-group-item-action">
          <h5 class="mb-1">Tournament Name 1</h5>
          <p class="mb-1">Details about the tournament, such as date, location, and teams.</p>
          <small>Starts on: YYYY-MM-DD</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <h5 class="mb-1">Tournament Name 2</h5>
          <p class="mb-1">Details about the tournament, such as date, location, and teams.</p>
          <small>Starts on: YYYY-MM-DD</small>
        </a>
        <!-- Add more tournaments as needed -->
      </div>
    </section>

    <!-- Match Information -->
    <section class="col-md-6 mb-4">
      <h2>Recent Matches</h2>
      <div class="list-group">
        <!-- Example Match Card -->
        <a href="#" class="list-group-item list-group-item-action">
          <h5 class="mb-1">Match 1: Team A vs Team B</h5>
          <p class="mb-1">Date: YYYY-MM-DD, Score: 3 - 2</p>
          <small>Location: Stadium 1</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <h5 class="mb-1">Match 2: Team C vs Team D</h5>
          <p class="mb-1">Date: YYYY-MM-DD, Score: 1 - 1</p>
          <small>Location: Stadium 2</small>
        </a>
        <!-- Add more matches as needed -->
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-light text-center py-3">
    <p>&copy; 2024 Tournament Monitoring System</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>