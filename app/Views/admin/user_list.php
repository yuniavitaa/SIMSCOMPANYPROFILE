<?= $this->extend('templates/admin_dashboard') ?>

<?= $this->section('content') ?>

<h3>Daftar User</h3>
<a href="/admin/user/create" class="btn btn-primary mb-3">Tambah User</a>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $index => $user) : ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $user['fullname'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <a href="/admin/user/edit/<?= $user['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/admin/user/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>