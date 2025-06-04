<?= $this->extend('layout/frontend_template') ?>
<?= $this->section('style') ?>
<style>
  /* (style tetap seperti yang kamu punya) */
</style>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<br><br><br>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-white shadow-lg">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url('assets/img/SIMS.png') ?>" height="30" alt="SIMS Logo" loading="lazy" />
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('service') ?>">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('experience') ?>">Experiences</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('about_us') ?>">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('contact_us') ?>">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('blog') ?>">Blog</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <div class="row">
    <!-- Bagian artikel -->
    <div class="col-lg-8">
      <p><small>Blog / News</small></p>
      <h1 class="fw-bold"><?= esc($blog['title']) ?></h1>
      <p class="text-muted">Admin SIMS - <?= date('d M Y', strtotime($blog['created_at'])) ?></p>

      <?php if (!empty($blog['image'])): ?>
        <img src="<?= base_url('assets/img/Blog' . $blog['image']) ?>" alt="<?= esc($blog['title']) ?>" class="img-fluid my-4">
      <?php else: ?>
        <img src="<?= base_url('assets/img/bgitem.png') ?>" alt="Gambar Utama" class="img-fluid my-4">
      <?php endif; ?>

      <div>
        <?= $blog['content'] ?>
      </div>
    </div>

    <!-- Bagian Share/For You -->
    <div class="col-lg-3">
      <div class="share-section sticky-top p-3 bg-light" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h5>Share</h5>
        <div class="d-flex justify-content-between mb-3">
          <img src="<?= base_url('assets/img/iconsosmed.png') ?>" alt="TikTok" class="img-fluid" style="margin-right: auto;">
        </div>
        <hr>
        <h5>For You</h5>
        <div class="row for-you-section overflow-auto" style="max-height: 300px;">
          <div class="col d-flex align-items-center col-12 mb-3">
            <img src="<?= base_url('assets/img/bigdng.png') ?>" class="img-fluid" alt="..." style="max-width: 100px; height: auto; margin-right: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-body p-0">
              <h6 class="card-title">Lorem Ipsum Dolor Sit Amet</h6>
            </div>
          </div>
          <div class="col d-flex align-items-center col-12 mb-3">
            <img src="<?= base_url('assets/img/bisunset.png') ?>" class="img-fluid" alt="..." style="max-width: 100px; height: auto; margin-right: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-body p-0">
              <h6 class="card-title">Lorem Ipsum Dolor Sit Amet</h6>
            </div>
          </div>
          <div class="col d-flex align-items-center col-12 mb-3">
            <img src="<?= base_url('assets/img/bitv.png') ?>" alt="..." style="max-width: 100px; height: auto; margin-right: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-body p-0">
              <h6 class="card-title">Lorem Ipsum Dolor Sit Amet</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>