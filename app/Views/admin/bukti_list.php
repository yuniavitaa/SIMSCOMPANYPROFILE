<?= $this->extend('templates/admin_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Bukti Pembayaran</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="buktiPembayaranTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pembayaran)): ?>
                    <?php foreach ($pembayaran as $key => $pay): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= esc($pay['nama']) ?></td>
                            <td><?= esc($pay['email']) ?></td>
                            <td><?= esc($pay['nomor_hp']) ?></td>
                            <td><?= esc($pay['package_name']) ?></td>
                            <td><?= number_format($pay['package_price'], 2) ?></td>
                            <td>
                                <?php if (!empty($pay['bukti_pembayaran']) && file_exists(WRITEPATH . 'uploads/' . $pay['bukti_pembayaran'])): ?>
                                    <a href="/uploads/<?= esc($pay['bukti_pembayaran']) ?>" target="_blank">Lihat Bukti</a>
                                <?php else: ?>
                                    <span class="text-danger">Bukti tidak tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= $pay['status'] === 'pending'
                                    ? '<span class="badge bg-warning">Menunggu Verifikasi</span>'
                                    : '<span class="badge bg-success">Sudah Upload Bukti</span>' ?>
                            </td>
                            <td>
                                <?php if ($pay['status'] === 'pending'): ?>
                                    <form action="/pendaftaran/verifikasiPembayaran/<?= esc($pay['id']) ?>" method="post">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-success btn-sm">Verifikasi</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data pembayaran.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#buktiPembayaranTable').DataTable();
    });
</script>

<?= $this->endSection(); ?>