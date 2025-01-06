<?= $this->extend('layout/frontend_template') ?>


<?= $this->section('style') ?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 80px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    .status-sedang {
        background-color: #ffc107;
        /* Warna kuning */
        color: #fff;
    }

    .status-belum {
        background-color: #dc3545;
        /* Warna merah */
        color: #fff;
    }

    .status-sudah {
        background-color: #28a745;
        /* Warna hijau */
        color: #fff;
    }

    h2 {
        margin-top: 40px;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
    }

    .container h1 {
        margin-top: 8%;
        font-family: "Darker Grotesque", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

   
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <h1 class="text-center"><?= esc($title); ?></h1>

    <!-- Tabel Riwayat Sudah Dikirim -->
    <h2>Riwayat Pembelian</h2>

    <!-- Tabel Riwayat Sudah Diverifikasi -->
    <?php if (!empty($riwayatSudahVerifikasi)): ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $counter = 1;
                foreach ($riwayatSedangVerifikasi as $key => $item): ?>
                    <tr id="row_<?= $item['pendaftaran_id']; ?>">
                        <td><?= $counter++; ?></td> <!-- Increment nomor -->
                        <td><?= esc($item['nama']); ?></td>
                        <td><?= esc($item['email']); ?></td>
                        <td><?= esc($item['nomor_hp']); ?></td>
                        <td><?= esc($item['package_name']); ?></td>
                        <td><?= esc($item['package_price']); ?></td>
                        <td><?= esc($item['bukti_pembayaran']); ?></td>
                        <td id="status_<?= $item['pendaftaran_id']; ?>"
                            class="<?= $item['status'] == 'sudah_verifikasi' ? 'status-sudah' : ($item['status'] == 'belum_valid' ? 'status-belum' : 'status-sedang'); ?>">
                            <?= ucwords(str_replace('_', ' ', $item['status'])); ?>
                        <td><?= date('d-m-Y H:i', strtotime($item['created_at'])); ?></td>
                        <td>
                            <a href="<?= base_url('/pendaftaran/detailRiwayat/' . $item['pendaftaran_id']); ?>">Invoice</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($riwayatSudahVerifikasi as $key => $item): ?>
                    <tr id="row_<?= $item['pendaftaran_id']; ?>">
                        <td><?= $counter++; ?></td> <!-- Lanjutkan nomor -->
                        <td><?= esc($item['nama']); ?></td>
                        <td><?= esc($item['email']); ?></td>
                        <td><?= esc($item['nomor_hp']); ?></td>
                        <td><?= esc($item['package_name']); ?></td>
                        <td><?= esc($item['package_price']); ?></td>
                        <td><?= esc($item['bukti_pembayaran']); ?></td>
                        <td id="status_<?= $item['pendaftaran_id']; ?>"
                            class="<?= $item['status'] == 'sudah_verifikasi' ? 'status-sudah' : ($item['status'] == 'belum_valid' ? 'status-belum' : 'status-sedang'); ?>">
                            <?= ucwords(str_replace('_', ' ', $item['status'])); ?>
                        </td>
                        <td><?= date('d-m-Y H:i', strtotime($item['created_at'])); ?></td>
                        <td>
                            <?php if ($item['status'] == 'sudah_verifikasi'): ?>
                                <button onclick="verifyOrder(<?= $item['pendaftaran_id']; ?>)">Verifikasi Pesanan</button>
                            <?php endif; ?>
                            <a href="<?= base_url('/pendaftaran/detailRiwayat/' . $item['pendaftaran_id']); ?>">Invoice</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($riwayatBelumValid as $key => $item): ?>
                    <tr id="row_<?= $item['pendaftaran_id']; ?>">
                        <td><?= $counter++; ?></td> <!-- Lanjutkan nomor -->
                        <td><?= esc($item['nama']); ?></td>
                        <td><?= esc($item['email']); ?></td>
                        <td><?= esc($item['nomor_hp']); ?></td>
                        <td><?= esc($item['package_name']); ?></td>
                        <td><?= esc($item['package_price']); ?></td>
                        <td><?= esc($item['bukti_pembayaran']); ?></td>
                        <td id="status_<?= $item['pendaftaran_id']; ?>"
                            class="<?= $item['status'] == 'sudah_verifikasi' ? 'status-sudah' : ($item['status'] == 'belum_valid' ? 'status-belum' : 'status-sedang'); ?>">
                            <?= ucwords(str_replace('_', ' ', $item['status'])); ?>
                        </td>
                        <td><?= date('d-m-Y H:i', strtotime($item['created_at'])); ?></td>
                        <td>
                            <a href="<?= base_url('/pendaftaran/detailRiwayat/' . $item['pendaftaran_id']); ?>">Invoice</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada riwayat pembayaran yang sudah diverifikasi.</p>
    <?php endif; ?>


</div>

<script>
    // Fungsi untuk memperbarui status pembayaran
    function updateStatus(id) {
        $.ajax({
            url: '/pendaftaran/updateStatusPembayaran/' + id, // URL untuk update status
            type: 'POST',
            data: {
                status: 'verified', // Status yang akan diupdate
                <?= csrf_token() ?>: '<?= csrf_hash() ?>'
            },
            success: function(response) {
                // Jika status berhasil diperbarui, update tampilan status di tabel
                if (response.status === 'verified') {
                    const statusElement = $('#status_' + id);
                    statusElement.text('Verified')
                        .removeClass('status-sedang status-belum')
                        .addClass('status-sudah'); // Menambahkan kelas baru
                    // Remove button Verifikasi
                    $('#row_' + id + ' button').remove();
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat memperbarui status.');
            }
        });
    }
</script>


<?= $this->endSection() ?>