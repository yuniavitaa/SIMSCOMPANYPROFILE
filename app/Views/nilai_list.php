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

    .foto-gallery img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
        margin: 5px;
    }

    .video-container video {
        width: 100%;
        max-height: 200px;
        border-radius: 5px;
    }

    .foto-gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .foto-thumbnail {
        width: 120px;
        height: auto;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Riwayat Penilaian</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php foreach ($penilaian as $nilai): ?>
        <div class="review-card">
            <div class="user-info">
                <strong><?= esc($nilai['fullname']) ?></strong>
                <span class="package">(<?= esc($nilai['package_name']) ?>)</span>
            </div>
            <div class="review-header">
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star <?= $i <= $nilai['rating'] ? 'filled' : '' ?>"></i>
                    <?php endfor; ?>
                </div>
                <span class="date"><?= date('d M Y, H:i', strtotime($nilai['created_at'])) ?></span>
            </div>

            <!-- Galeri Media -->
            <div class="media-gallery">
                <!-- Menampilkan Foto -->
                <?php if (!empty($nilai['foto'])): ?>
                    <div class="foto-gallery">
                        <?php
                        // Decode foto jika masih dalam bentuk string JSON
                        $fotoList = is_string($nilai['foto']) ? json_decode($nilai['foto'], true) : $nilai['foto'];

                        // Cek apakah hasil decode berupa array yang valid
                        if (!empty($fotoList) && is_array($fotoList)):
                            foreach ($fotoList as $foto):
                                if (!empty($foto) && file_exists(FCPATH . $foto)): // Pastikan gambar tidak kosong dan benar-benar ada di server
                        ?>
                                    <img src="<?= base_url($foto); ?>" alt="Foto Penilaian" class="foto-thumbnail">
                        <?php
                                endif;
                            endforeach;
                        else:
                            echo "<p>Tidak ada foto tersedia.</p>";
                        endif;
                        ?>
                    </div>
                <?php else: ?>
                    <p>Tidak ada foto tersedia.</p>
                <?php endif; ?>



                <!-- Menampilkan Video -->
                <?php if (!empty($nilai['video'])): ?>
                    <div class="video-container">
                        <video controls>
                            <source src="<?= base_url($nilai['video']); ?>" type="video/mp4">
                            Browser tidak mendukung video.
                        </video>
                    </div>
                <?php endif; ?>
            </div>

            <p class="comment"><?= esc($nilai['komentar']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>