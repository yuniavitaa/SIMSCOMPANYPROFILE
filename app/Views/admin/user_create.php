<?= $this->extend('templates/admin_dashboard') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah User</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('/admin/user/create') ?>">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Fullname:</label>
                    <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select id="role" name="role" class="form-select">
                        <option value="member">Member</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('/admin/users') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>