<?= $this->extend('templates/admin_dashboard') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Tambah Blog</h3>
    <form action="/admin/blog/store" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= old('title') ?>" required>
        </div>

        <div class="form-group">
            <label for="content">Konten</label>
            <textarea name="content" id="content" rows="5" class="form-control" required><?= old('content') ?></textarea>
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" name="category" id="category" class="form-control" value="<?= old('category') ?>" required>
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection() ?>