<?= $this->extend('templates/admin_dashboard') ?>

<?= $this->section('style') ?>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="text-center">Riwayat Pembelian</h1>

    <a href="<?= base_url('admin/create'); ?>" class="btn btn-primary mb-3">Tambah Riwayat</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($riwayat as $key => $row): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= esc($row['nama']) ?></td>
                    <td><?= esc($row['email']) ?></td>
                    <td><?= esc($row['nomor_hp']) ?></td>
                    <td><?= esc($row['package_name']) ?></td>
                    <td><?= number_format($row['package_price'], 2) ?></td>
                    <td>
                        <form action="<?= base_url('admin/updateStatus/' . $row['id']) ?>" method="post">
                            <?= csrf_field() ?>
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="sedang_verifikasi" <?= $row['status'] === 'sedang_verifikasi' ? 'selected' : '' ?>>Sedang Verifikasi</option>
                                <option value="sudah_verifikasi" <?= $row['status'] === 'sudah_verifikasi' ? 'selected' : '' ?>>Sudah Verifikasi</option>
                                <option value="belum_valid" <?= $row['status'] === 'belum_valid' ? 'selected' : '' ?>>Belum Valid</option>
                            </select>
                        </form>
                    </td>
                    <td><?= date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>
                    <td>
                        <a href="<?= base_url('admin/detail/' . $row['id']) ?>" class="btn btn-primary btn-sm">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?= $this->endSection() ?>