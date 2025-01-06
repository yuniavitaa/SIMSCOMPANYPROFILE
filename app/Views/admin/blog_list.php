<?= $this->extend('templates/admin_dashboard') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Daftar Blog</h3>
    <a href="/admin/blog/create" class="btn btn-primary mb-3">Tambah Blog</a>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Kategori</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diperbarui</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $index => $blog) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td>
                        <?php
                        // Tentukan path gambar
                        $imagePath = 'assets/img/Blog/' . esc($blog['image'] ?? 'default.png');
                        if (!file_exists(FCPATH . $imagePath)) {
                            $imagePath = 'assets/img/Blog/default.png'; // Gambar default jika tidak ditemukan
                        }
                        ?>
                        <img src="<?= base_url($imagePath) ?>" alt="<?= esc($blog['title']) ?>" style="width: 100px; height: auto;">
                    </td>
                    <td><?= esc($blog['title']) ?></td>
                    <td>
                        <?= esc(substr($blog['content'], 0, 100)) ?><?= strlen($blog['content']) > 100 ? '...' : '' ?>
                    </td>
                    <td><?= esc($blog['category']) ?></td>
                    <td><?= esc($blog['created_at']) ?></td>
                    <td><?= esc($blog['updated_at'] ?? 'Belum diperbarui') ?></td>
                    <td>
                        <a href="/admin/blog/edit/<?= $blog['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/admin/blog/delete/<?= $blog['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus blog ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>