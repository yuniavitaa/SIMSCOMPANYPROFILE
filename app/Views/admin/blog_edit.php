<?= $this->extend('templates/admin_dashboard') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Edit Blog</h3>
    <form action="/admin/blog/update/<?= $blog['id'] ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= esc($blog['title']) ?>" required>
        </div>

        <div class="form-group">
            <label for="content">Konten</label>
            <textarea name="content" id="content" rows="5" class="form-control" required><?= esc($blog['content']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" name="category" id="category" class="form-control" value="<?= esc($blog['category']) ?>" required>
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control-file">
            <?php if (!empty($blog['image']) && file_exists(FCPATH . $blog['image'])) : ?>
                <small>Gambar saat ini:
                    <a href="<?= base_url($blog['image']) ?>" target="_blank">Lihat</a>
                </small>
            <?php else : ?>
                <small>Gambar tidak ditemukan.</small>
            <?php endif; ?>
        </div>


        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>

<?= $this->endSection() ?>