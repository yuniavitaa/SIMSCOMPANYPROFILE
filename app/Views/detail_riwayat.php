<?= $this->extend('layout/frontend_template') ?>

<?= $this->section('style') ?>
<style>
    .container {
        max-width: 800px;
    }

    .container h1 {
        margin-top: 8%;
        font-family: "Darker Grotesque", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    .bukti-pembayaran img {
        max-width: 100%;
        height: auto;
        margin-top: 20px;
    }

    .bukti-pembayaran h2 {
        font-family: "Darker Grotesque", sans-serif;
        font-weight: 700;
        font-style: normal;
    }


    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    iframe {
        border: 1px solid #ddd;
        margin-top: 20px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<title>Detail Riwayat Pembayaran</title>

<div class="container">
    <h1>Detail Riwayat Pendaftaran</h1>

    <table>
        <tr>
            <th>Nama Paket</th>
            <td><?= esc($dataPendaftaran['package_name']); ?></td>
        </tr>
        <tr>
            <th>Harga Paket</th>
            <td><?= esc($dataPendaftaran['package_price']); ?></td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td><?= esc($dataPendaftaran['nama_lengkap']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= esc($dataPendaftaran['email']); ?></td>
        </tr>
        <tr>
            <th>Nomor HP</th>
            <td><?= esc($dataPendaftaran['nomor_hp']); ?></td>
        </tr>
        <tr>
            <th>Domisili</th>
            <td><?= esc($dataPendaftaran['domisili']); ?></td>
        </tr>
        <tr>
            <th>Perusahaan</th>
            <td><?= esc($dataPendaftaran['perusahaan']); ?></td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td><?= esc($dataPendaftaran['jabatan']); ?></td>
        </tr>
        <tr>
            <th>ID Type</th>
            <td><?= esc($dataPendaftaran['id_type']); ?></td>
        </tr>
        <tr>
            <th>Nomor ID</th>
            <td><?= esc($dataPendaftaran['nomor_id']); ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?= esc($dataPendaftaran['gender']); ?></td>
        </tr>
        <tr>
            <th>Metode Pembayaran</th>
            <td><?= esc($dataPendaftaran['payment_method']); ?></td>
        </tr>
        
    </table>

    <?php if ($buktiPembayaran): ?>
        <h2>Bukti Pembayaran</h2>
        <?php
        $filePath = base_url('uploads/' . $buktiPembayaran['bukti_pembayaran']);
        $fileExtension = strtolower(pathinfo($buktiPembayaran['bukti_pembayaran'], PATHINFO_EXTENSION));
        ?>
        <?php switch ($fileExtension):
            case 'jpg':
            case 'jpeg':
            case 'png': ?>
                <img src="<?= $filePath ?>" alt="Bukti Pembayaran" style="max-width: 100%; height: auto;">
                <?php break; ?>
            <?php
            case 'pdf': ?>
                <iframe src="<?= $filePath ?>" width="100%" height="600px"></iframe>
                <p><a href="<?= $filePath ?>" target="_blank">Unduh PDF</a></p>
                <?php break; ?>
            <?php
            default: ?>
                <p>Format file tidak didukung.</p>
        <?php endswitch; ?>

    <?php else: ?>
        <p>Bukti pembayaran tidak tersedia.</p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>