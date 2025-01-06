<?= $this->extend('layout/frontend_template') ?>

<?= $this->section('style') ?>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f1f3f5;
    }

    .content-container {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 500px;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    h3 {
        text-align: center;
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #333;
    }

    .alert {
        font-size: 16px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
    }

    .alert-danger {
        background-color: #dc3545;
        color: white;
    }

    .form-label {
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        width: 100%;
    }

    button:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    button:active {
        background-color: #004085;
        transform: translateY(0);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-text {
        font-size: 12px;
        color: #6c757d;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container d-flex justify-content-center">
    <div class="content-container">
        <h3>Upload Bukti Pembayaran</h3>

        <!-- Feedback -->
        <?php if (session()->getFlashdata('sukses')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('sukses') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('gagal')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('gagal') ?>
            </div>
        <?php endif; ?>

        <form action="/pendaftaran-anggota/prosesUploadBukti" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pendaftaran_id" value="<?= $dataPendaftaran['id'] ?>">
            <div class="form-group">
                <label for="package_name" class="form-label"><strong>Nama Paket:</strong></label>
                <p class="form-control-plaintext"><?= $dataPendaftaran['package_name'] ?></p>
            </div>

            <div class="form-group">
                <label for="package_price" class="form-label"><strong>Harga Paket:</strong></label>
                <p class="form-control-plaintext"><?= 'Rp ' . number_format($dataPendaftaran['package_price'], 0, ',', '.') ?></p>
            </div>
            <div class="form-group">
                <label for="nama" class="form-label"><strong>Nama:</strong></label>
                <p class="form-control-plaintext"><?= $dataPendaftaran['nama_lengkap'] ?></p>
            </div>

            <div class="form-group">
                <label for="email" class="form-label"><strong>Email:</strong></label>
                <p class="form-control-plaintext"><?= $dataPendaftaran['email'] ?></p>
            </div>

            <div class="form-group">
                <label for="nomor_hp" class="form-label"><strong>Nomor HP:</strong></label>
                <p class="form-control-plaintext"><?= $dataPendaftaran['nomor_hp'] ?></p>
            </div>

            <div class="form-group">
                <label for="payment_method" class="form-label"><strong>Metode Pembayaran:</strong></label>
                <p class="form-control-plaintext"><?= $dataPendaftaran['payment_method'] ?></p>
            </div>

            <div class="form-group">
                <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*,application/pdf">
                <small class="form-text">Pilih gambar atau file PDF yang sesuai dengan bukti pembayaran Anda.</small>
            </div>

            <button type="submit">Kirim</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>