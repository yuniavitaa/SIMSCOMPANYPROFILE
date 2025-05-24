<form action="<?= base_url('admin/contact/update/' . $message['id']) ?>" method="post">
    <div class="form-group">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <label for="keperluan">Keperluan</label>
        <input type="text" name="keperluan" id="keperluan" value="<?= esc($message['keperluan']) ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="pesan">Pesan</label>
        <textarea name="pesan" id="pesan" class="form-control" required><?= esc($message['pesan']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>