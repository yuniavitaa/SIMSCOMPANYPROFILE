<?= $this->extend('layout/frontend_template') ?>

<?= $this->section('style') ?>
<style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    .container h2 {

        margin-top: 100px;

    }

    .review-card {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .rating i {
        color: #FFD700;
    }

    .rating .filled {
        color: #FFA500;
    }

    .comment {
        margin: 10px 0;
        font-size: 14px;
    }

    .photo-gallery img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 5px;
    }

    .video-container video {
        width: 100%;
        max-height: 200px;
        border-radius: 5px;
    }
</style>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="container ">
    <h2>Riwayat Penilaian</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php foreach ($penilaian as $nilai): ?>
        <div class="review-card">
            <div class="user-info">
                <strong><?= esc($nilai['fullname']) ?></strong> <!-- Nama User -->
                <span class="package">(<?= esc($nilai['package_name']) ?>)</span> <!-- Nama Paket -->
            </div>
            <div class="review-header">
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star <?= $i <= $nilai['rating'] ? 'filled' : '' ?>"></i>
                    <?php endfor; ?>
                </div>
                <span class="date"><?= date('d M Y, H:i', strtotime($nilai['created_at'])) ?></span>
            </div>
            <p class="comment"><?= esc($nilai['komentar']) ?></p>

            <?php if (!empty($nilai['foto'])): ?>
                <div class="photo-gallery">
                    <?php
                    // Cek apakah nilai['foto'] adalah string
                    if (is_string($nilai['foto'])) {
                        $fotoList = json_decode($nilai['foto'], true); // Decode JSON ke array
                    } else {
                        $fotoList = $nilai['foto']; // Jika sudah array, gunakan langsung
                    }

                    if (!empty($fotoList)):
                        foreach ($fotoList as $foto): ?>
                            <img src="<?= base_url($foto) ?>" alt="Foto Penilaian">
                    <?php endforeach;
                    endif;
                    ?>
                </div>
            <?php endif; ?>

            <?php if ($nilai['video']): ?>
                <div class="video-container">
                    <video controls>
                        <source src="<?= base_url($nilai['video']) ?>" type="video/mp4">
                        Browser Anda tidak mendukung video tag.
                    </video>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>