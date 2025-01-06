<?= $this->extend('templates/admin_dashboard'); ?>

<?= $this->section('content'); ?>
<?php if (!empty($notifications)): ?>
    <?php foreach ($notifications as $notification): ?>
        <div class="alert alert-info">
            <?= esc($notification['message']); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


<div class="container mt-4">
    <h1 class="mb-4"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Pendaftar</h5>
                    <p class="fs-3"><?= $total_pendaftar; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Sudah Verifikasi</h5>
                    <p class="fs-3"><?= $total_sudah_verifikasi; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Sedang Verifikasi</h5>
                    <p class="fs-3"><?= $total_sedang_verifikasi; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Belum Valid</h5>
                    <p class="fs-3"><?= $total_belum_verifikasi; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Total Pembayaran</h5>
                    <p class="fs-3"><?= $total_pembayaran; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>