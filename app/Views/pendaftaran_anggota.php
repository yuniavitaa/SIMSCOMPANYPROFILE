<?= $this->extend('layout/frontend_template') ?>

<?= $this->section('style') ?>
<style>
    .form-container {
        margin-top: 5rem;
    }

    .form-label {
        font-weight: bold;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php helper('form'); ?>
<div class="container form-container">
    <div class="row">
        <p class="display-3 mb-5" data-aos="fade-up">Form Pendaftaran</p>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('sukses')) : ?>
            <div class="alert alert-success" role="alert" data-aos="fade-down">
                <?= session()->getFlashdata('sukses') ?>
            </div>
        <?php elseif (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger" role="alert" data-aos="fade-down">
                <?= session()->getFlashdata('gagal') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>


        <!-- Informasi Wajib Diisi -->
        <small class="text-secondary">* Wajib diisi</small>

        <!-- Form Pendaftaran -->
        <form action="/pendaftaran/kirim" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="display_package_name" class="form-label">Nama Paket</label>
                <input id="display_package_name" class="form-control" type="text" name="package_name" value="<?= session()->get('package_name') ?>" readonly />
            </div>

            <div class="mb-3">
                <label for="display_package_price" class="form-label">Harga Paket</label>
                <input id="display_package_price" class="form-control" type="text" name="package_price" value="Rp <?= number_format(session()->get('package_price'), 0, ',', '.') ?>" readonly />
            </div>
            <!-- Nama Lengkap -->
            <div class="mb-3">
                <label for="fullname" class="form-label">Nama Lengkap *</label>
                <input id="fullname" class="form-control <?= (validation_show_error('fullname')) ? 'is-invalid' : ''; ?>" type="text" name="fullname" value="<?= old('fullname', session()->get('fullname') ?? '') ?>" required readonly />
                <div class="invalid-feedback">
                    <?= validation_show_error('fullname'); ?>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email *</label>
                <input id="email" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : ''; ?>" type="email" name="email" value="<?= old('email', $email ?? '') ?>" required autocomplete="email" readonly />
                <div class="invalid-feedback">
                    <?= validation_show_error('email'); ?>
                </div>
            </div>


            <!-- Nomor HP -->
            <div class="mb-3">
                <label for="nomorHp" class="form-label">Nomor HP *</label>
                <input type="text" class="form-control" id="nomorHp" name="nomorHp" value="<?= old('nomorHp') ?>" required />
            </div>

            <!-- Domisili -->
            <div class="mb-3">
                <label for="domisili" class="form-label">Domisili *</label>
                <input type="text" class="form-control" id="domisili" name="domisili" value="<?= old('domisili') ?>" required />
            </div>

            <!-- Perusahaan (Opsional) -->
            <div class="mb-3">
                <label for="perusahaan" class="form-label">Perusahaan (Opsional)</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="<?= old('perusahaan') ?>" />
            </div>

            <!-- Jabatan (Opsional) -->
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan (Opsional)</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= old('jabatan') ?>" />
            </div>

            <!-- Alamat Perusahaan (Opsional) -->
            <div class="mb-3">
                <label for="alamatPerusahaan" class="form-label">Alamat Perusahaan (Opsional)</label>
                <textarea class="form-control" id="alamatPerusahaan" name="alamatPerusahaan"><?= old('alamatPerusahaan') ?></textarea>
            </div>

            <!-- Tipe ID -->
            <div class="mb-3">
                <label for="id_type" class="form-label">Tipe ID *</label>
                <select class="form-select" id="id_type" name="id_type" required>
                    <option value="">-- Pilih Tipe ID --</option>
                    <option value="ktp" <?= old('id_type') == 'ktp' ? 'selected' : '' ?>>KTP</option>
                    <option value="sims" <?= old('id_type') == 'sims' ? 'selected' : '' ?>>SIM</option>
                    <option value="pasport" <?= old('id_type') == 'pasport' ? 'selected' : '' ?>>Paspor</option>
                </select>
            </div>

            <!-- Nomor ID -->
            <div class="mb-3">
                <label for="nomor_id" class="form-label">Nomor ID *</label>
                <input type="text" class="form-control" id="nomor_id" name="nomor_id" value="<?= old('nomor_id') ?>" required />
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin *</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="laki-laki" <?= old('gender') == 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="perempuan" <?= old('gender') == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran *</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="transfer" <?= old('payment_method') == 'transfer' ? 'selected' : '' ?>>Transfer</option>
                    <option value="gopay" <?= old('payment_method') == 'gopay' ? 'selected' : '' ?>>GoPay</option>
                    <option value="shoppepay" <?= old('payment_method') == 'shoppepay' ? 'selected' : '' ?>>ShopeePay</option>
                    <option value="dana" <?= old('payment_method') == 'dana' ? 'selected' : '' ?>>DANA</option>
                </select>
            </div>

            <!-- Tombol Kirim -->
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function setPackage(packageName, packagePrice) {
        $.post('/pendaftaran/setPackage', {
            package_name: packageName,
            package_price: packagePrice
        }, function() {
            window.location.href = '/pendaftaran'; // Redirect ke form pendaftaran
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed: " + textStatus + ", " + errorThrown);
        });
    }
</script>

<?= $this->endSection(); ?>