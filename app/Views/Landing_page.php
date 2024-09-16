<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B.T.S</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
                    <a href="#" class="btn btn-outline-light btn-lg">Log In</a>
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Summer Slam 1</h3>
                                <p class="card-text">Join our exciting summer basketball tournament!</p>
                                <p>Date: July 11, 2023</p>
                                <p>Location: City Sports Arena</p>
                                <a href="#" class="btn btn-primary w-100">Register Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Summer Slam 2</h3>
                                <p class="card-text">Join our exciting summer basketball tournament!</p>
                                <p>Date: July 12, 2023</p>
                                <p>Location: City Sports Arena</p>
                                <a href="#" class="btn btn-primary w-100">Register Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Summer Slam 3</h3>
                                <p class="card-text">Join our exciting summer basketball tournament!</p>
                                <p>Date: July 13, 2023</p>
                                <p>Location: City Sports Arena</p>
                                <a href="#" class="btn btn-primary w-100">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="cta" class="py-5 bg-primary text-white">
            <div class="container text-center">
                <h2 class="mb-4">Ready to Join the League?</h2>
                <p class="lead mb-4">Sign up now to stay updated on upcoming tournaments and exclusive offers.</p>
                <form class="row g-3 justify-content-center">
                    <div class="col-auto">
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-light">Subscribe</button>
                    </div>
                </form>
                <p class="mt-3 small">By subscribing, you agree to our Terms & Conditions.</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>