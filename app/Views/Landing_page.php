<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B.T.S</title>
    <link href="<?php echo base_url('Resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('Resources/font/bootstrap-icons.min.css'); ?>" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="bi bi-basketball me-2"></i>
                <span class="fw-bold">B.T.S</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/monitoringTournamentsRankings'); ?>">Tournaments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/login'); ?>">Log-in</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="bg-primary text-white py-5">
            <div class="container text-center">
                <h1 class="display-4 fw-bold mb-3">Basketball Tournament Scheduler</h1>
                <p class="lead mb-4">Organize, manage, and participate in basketball tournaments like never before. Join the ultimate platform for basketball enthusiasts.</p>
                <div>
                    <a href="#" class="btn btn-light btn-lg me-2">Sing Up</a>
                    <a href="<?php echo base_url('/login'); ?>" class="btn btn-outline-light btn-lg">Log In</a>
                </div>
            </div>
        </section>

        <section id="features" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5">Features</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="bi bi-calendar-event display-4 text-primary mb-3"></i>
                                <h3 class="card-title">Easy Scheduling</h3>
                                <p class="card-text">Effortlessly plan and schedule tournaments with our intuitive interface.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="bi bi-people display-4 text-primary mb-3"></i>
                                <h3 class="card-title">Team Management</h3>
                                <p class="card-text">Create and manage teams with ease, track player stats, and more.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <i class="bi bi-trophy display-4 text-primary mb-3"></i>
                                <h3 class="card-title">Live Scoring</h3>
                                <p class="card-text">Real-time score updates and tournament brackets for all participants.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="tournaments" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">Upcoming Tournaments</h2>
                <div class="row g-4">
                    <?php if (!empty($tournaments)) : ?>
                        <?php foreach ($tournaments as $tournament) : ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $tournament->tournament_name; ?></h3>
                                        <p class="card-text">Join our exciting summer basketball tournament!</p>
                                        <p>Date: <?php echo $tournament->tournament_start_date; ?></p>
                                        <p>Location: <?php echo $tournament->tournament_location; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center">No tournaments found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-3 bg-light">
        <div class="container text-center">
            <p class="mb-0">&copy; 2023 HoopHub. All rights reserved.</p>
            <ul class="list-inline mt-2">
                <li class="list-inline-item"><a href="#" class="text-muted">Terms of Service</a></li>
                <li class="list-inline-item"><a href="#" class="text-muted">Privacy</a></li>
            </ul>
        </div>
    </footer>

    <script src="<?php echo base_url('Resources/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>