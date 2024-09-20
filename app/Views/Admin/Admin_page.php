<?php echo $this->extend('Templates/Layout'); ?>
<?php echo $this->section('content'); ?>
<!-- Main Content -->
<main id="main-content">

  <?php echo $this->include('Templates/Components/Topbar'); ?>
  <!-- Dashboard Content -->
  <section class="container-fluid mt-4">
    <div class="row">
      <article class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            Total Tournaments
          </div>
          <div class="card-body">
            <p class="card-text">All active tournaments: <?= $total_tournaments ?></p>
            <a href="<?= base_url('admin/tournaments') ?>" class="btn btn-primary">View All</a>
          </div>
        </div>
      </article>
      <article class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            Total Teams
          </div>
          <div class="card-body">
            <p class="card-text">All active teams: <?= $total_teams ?></p>
            <a href="<?= base_url('admin/teams') ?>" class="btn btn-primary">View All</a>
          </div>
        </div>
      </article>
      <article class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            Total Players
          </div>
          <div class="card-body">
            <p class="card-text">All active players: <?= $total_players ?></p>
            <a href="<?= base_url('admin/players') ?>" class="btn btn-primary">View All</a>
          </div>
        </div>
      </article>
      <article class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            Total referees
          </div>
          <div class="card-body">
            <p class="card-text">All active referees: <?= $total_referees ?></p>
            <a href="<?= base_url('admin/referees') ?>" class="btn btn-primary">View All</a>
          </div>
        </div>
      </article>
    </div>
  </section>
</main>
<?php echo $this->endSection(); ?>