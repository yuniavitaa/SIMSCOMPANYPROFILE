<?= $this->extend('templates/admin_dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="mt-4"><?= $title ?></h1>
    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('gagal') ?></div>
    <?php endif; ?>
    <form action="/admin/pendaftaran/simpan" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= $pendaftaran['id'] ?? '' ?>">
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $pendaftaran['nama_lengkap'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $pendaftaran['email'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="nomorHp">Nomor HP</label>
            <input type="text" name="nomorHp" id="nomorHp" class="form-control" value="<?= $pendaftaran['nomor_hp'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="domisili">Domisili</label>
            <input type="text" name="domisili" id="domisili" class="form-control" value="<?= $pendaftaran['domisili'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="id_type">Tipe ID</label>
            <select name="id_type" id="id_type" class="form-control" required>
                <option value="ktp" <?= (isset($pendaftaran['id_type']) && $pendaftaran['id_type'] == 'ktp') ? 'selected' : '' ?>>KTP</option>
                <option value="sims" <?= (isset($pendaftaran['id_type']) && $pendaftaran['id_type'] == 'sims') ? 'selected' : '' ?>>SIM</option>
                <option value="pasport" <?= (isset($pendaftaran['id_type']) && $pendaftaran['id_type'] == 'pasport') ? 'selected' : '' ?>>Paspor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nomor_id">Nomor ID</label>
            <input type="text" name="nomor_id" id="nomor_id" class="form-control" value="<?= $pendaftaran['nomor_id'] ?? '' ?>" required>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="laki-laki" <?= (isset($pendaftaran['gender']) && $pendaftaran['gender'] == 'laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="perempuan" <?= (isset($pendaftaran['gender']) && $pendaftaran['gender'] == 'perempuan') ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>