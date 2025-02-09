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
        color: #fff;
    }

    .status-belum {
        background-color: #dc3545;
        color: #fff;
    }

    .status-sudah {
        background-color: #28a745;
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
    <h2>Riwayat Pembelian</h2>

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
            $allRiwayat = array_merge($riwayatSudahVerifikasi, $riwayatSedangVerifikasi, $riwayatBelumValid);
            foreach ($allRiwayat as $item): ?>
                <tr id="row_<?= $item->pendaftaran_id; ?>">
                    <td><?= $counter++; ?></td>
                    <td><?= esc($item->nama); ?></td>
                    <td><?= esc($item->email); ?></td>
                    <td><?= esc($item->nomor_hp); ?></td>
                    <td><?= esc($item->package_name); ?></td>
                    <td><?= esc($item->package_price); ?></td>
                    <td><?= esc($item->bukti_pembayaran); ?></td>
                    <td id="status_<?= $item->pendaftaran_id; ?>" class="<?= $item->status == 'sudah_verifikasi' ? 'status-sudah' : ($item->status == 'belum_valid' ? 'status-belum' : 'status-sedang'); ?>">
                        <?= ucwords(str_replace('_', ' ', $item->status)); ?>
                    </td>
                    <td><?= date('d-m-Y H:i', strtotime($item->created_at)); ?></td>
                    <td>
                        <a href="<?= base_url('/pendaftaran/detailRiwayat/' . $item->pendaftaran_id); ?>">Invoice</a>

                        <?php
                        // Periksa apakah sudah ada penilaian untuk pendaftaran ini
                        $sudahDinilai = in_array($item->pendaftaran_id, array_column($penilaian, 'pendaftaran_id'));
                        ?>

                        <?php if ($item->status == 'sudah_verifikasi' && !$sudahDinilai): ?>
                            <br>
                            <form action="<?= base_url('/pendaftaran/selesai/' . $item->pendaftaran_id); ?>" method="post">
                                <button type="submit" class="btn btn-success mt-2">Pesanan Selesai & Beri Nilai</button>
                            </form>
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?= $this->endSection() ?>