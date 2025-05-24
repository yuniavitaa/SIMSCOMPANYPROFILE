<?= $this->extend('templates/admin_dashboard'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Manajemen Penilaian</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penilaian as $index => $nilai): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= $nilai['rating']; ?></td>
                                <td><?= $nilai['komentar']; ?></td>
                                <td>
                                    <?php
                                    $fotoList = json_decode($nilai['foto'], true);
                                    if (!empty($fotoList) && is_array($fotoList)):
                                        foreach ($fotoList as $foto): ?>
                                            <img src="<?= base_url($foto); ?>" width="50">
                                    <?php endforeach;
                                    endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/penilaian/edit/' . $nilai['id']); ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('admin/penilaian/delete/' . $nilai['id']); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>