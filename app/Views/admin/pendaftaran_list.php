<?= $this->extend('templates/admin_dashboard'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Pendaftaran Anggota</h3>
    </div>
    <div class="card-body">
        <table id="pendaftaranTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Package Name</th>
                    <th>Package Price</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Domisili</th>
                    <th>Perusahaan</th>
                    <th>Jabatan</th>
                    <th>Alamat Perusahaan</th>
                    <th>ID Type</th>
                    <th>Nomor ID</th>
                    <th>Gender</th>
                    <th>Payment Method</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dataPendaftaran)) : ?>
                    <?php foreach ($dataPendaftaran as $index => $pendaftaran) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $pendaftaran['package_name'] ?></td>
                            <td><?= $pendaftaran['package_price'] ?></td>
                            <td><?= $pendaftaran['nama_lengkap'] ?></td>
                            <td><?= $pendaftaran['email'] ?></td>
                            <td><?= $pendaftaran['nomor_hp'] ?></td>
                            <td><?= $pendaftaran['domisili'] ?></td>
                            <td><?= $pendaftaran['perusahaan'] ?></td>
                            <td><?= $pendaftaran['jabatan'] ?></td>
                            <td><?= $pendaftaran['alamat_perusahaan'] ?></td>
                            <td><?= $pendaftaran['id_type'] ?></td>
                            <td><?= $pendaftaran['nomor_id'] ?></td>
                            <td><?= $pendaftaran['gender'] ?></td>
                            <td><?= $pendaftaran['payment_method'] ?></td>
                            <td><?= $pendaftaran['created_at'] ?></td>
                            <td>
                                <a href="<?= base_url('/pendaftaran/hapus/' . $pendaftaran['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="15" class="text-center">Belum ada data pendaftaran.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#pendaftaranTable').DataTable();
    });
</script>

<?= $this->endSection(); ?>