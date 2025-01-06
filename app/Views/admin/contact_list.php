<?= $this->extend('templates/admin_dashboard') ?> <!-- Extend template master -->

<?= $this->section('content') ?> <!-- Mulai bagian content -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Pesan Contact Us</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="contactTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Keperluan</th>
                    <th>Pesan</th>
                    <th>Waktu Dibuat</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($messages)): ?>
                    <?php foreach ($messages as $key => $message): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= esc($message['keperluan']) ?></td>
                            <td><?= esc($message['pesan']) ?></td>
                            <td><?= esc($message['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<?= $this->endSection() ?> <!-- Selesai bagian content -->