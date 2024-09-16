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
            Card 1
          </div>
          <div class="card-body">
            <p class="card-text">This is a simple card with some text inside.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </article>
      <article class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            Card 2
          </div>
          <div class="card-body">
            <p class="card-text">This is another simple card with more text inside.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </article>
    </div>

    <article class="row">
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
    </article>
  </section>
</main>
<?php echo $this->endSection(); ?>