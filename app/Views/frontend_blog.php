<?= $this->extend('layout/frontend_template') ?>
<?= $this->section('style') ?>
<style>
  
        .hero-section .carousel-item {
        height: 500px; /* atau 70vh jika ingin responsif */
        overflow: hidden;
    }

    .hero-section .carousel-item img {
        height: 100%;
        object-fit: cover; /* bisa kembali pakai cover jika ingin penuh */
    }


    .button-group .btn.active {
        background: linear-gradient(135deg, #ff416c, #4688f1);
        color: white;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .input-group .form-control {
        border-radius: 20px 0 0 20px;
    }

    .input-group .btn {
        border-radius: 0 20px 20px 0;
        background: linear-gradient(135deg, #ff416c, #4688f1);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        border: none;
    }

    .page-item .page-link {
        border-radius: 50%;
        border: 2px solid #ddd;
        padding: 10px 15px;
        color: #333;
        font-weight: bold;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #ff416c, #4688f1);
        color: white;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .page-item .page-link:hover {
        background: rgba(70, 136, 241, 0.1);
    }

    .page-item .page-link:focus {
        outline: none;
        box-shadow: 0 0 6px rgba(70, 136, 241, 0.5);
    }

    .pagination .page-link {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        margin: 0 5px;
        border: none;
    }

    .pagination .active .page-link {
        border: none;
    }



    .blog-list {
        text-align: center;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .blog-item {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .blog-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #2d66c5;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
    }

    .blog-item img {
        width: 100%;
        height: auto;
    }

    .blog-info {
        padding: 15px;
        text-align: left;
    }

    .blog-date {
        font-size: 14px;
        color: #888;
        margin-bottom: 5px;
    }

    .blog-title {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
    }

    .blog-title a {
        color: #333;
        text-decoration: none;
    }

    .blog-title a:hover {
        text-decoration: underline;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<header class="hero-section">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <?php foreach ($blogs as $index => $blog): ?>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= $index; ?>" class="<?= $index === 0 ? 'active' : ''; ?>" aria-current="<?= $index === 0 ? 'true' : ''; ?>" aria-label="Slide <?= $index + 1; ?>"></button>
            <?php endforeach; ?>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <?php foreach ($blogs as $index => $blog): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>" style="position: relative;">
                    <div class="hero-overlay"></div>
                    <img src="<?= base_url('assets/img/Blog/' . esc($blog['image'] ?? 'default.png')); ?>" class="d-block w-100" alt="<?= esc($blog['title']); ?>">
                    <div class="container" style="z-index: 1; position: absolute; top: 50%; transform: translateY(-50%);">
                        <div class="row">
                            <div class="col">
                                <span class="badge badge-pill badge-light text-dark mb-3 px-3 py-2" style="border-radius:50px;">News</span>
                                <div class="hero-content">
                                    <p class="chakra-petch-bold"><?= date('d F Y', strtotime($blog['created_at'])); ?></p>
                                    <h1><?= esc($blog['title']); ?></h1>
                                    <p class="chakra-petch-bold"><?= esc($blog['content']); ?></p>
                                    <a href="<?= base_url('frontend_blog_item/' . $blog['id']); ?>" class="btn btn-outline-light btn-lg chakra-petch-medium" data-mdb-ripple-init>Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</header>


<section class="blog-list">
    <?php if (!empty($blogs) && is_array($blogs)): ?>
        <div class="blog-grid">
            <?php foreach ($blogs as $blog): ?>
                <div class="blog-item">
                    <div class="blog-badge">Blog</div>
                    <?php
                    $imagePath = 'assets/img/Blog/' . esc($blog['image'] ?? 'default.png');
                    if (!file_exists(FCPATH . $imagePath)) {
                        $imagePath = 'assets/img/Blog/default.png'; // Gambar default
                    }
                    ?>
                    <img src="<?= base_url($imagePath); ?>" alt="<?= esc($blog['title'] ?? 'Blog'); ?>">
                    <div class="blog-info">
                        <p class="blog-date">
                            <?= isset($blog['created_at']) ? date('d F Y', strtotime($blog['created_at'])) : 'Tanggal tidak tersedia'; ?>
                        </p>
                        <h2 class="blog-title">
                            <a href="<?= base_url('blog/' . ($blog['id'] ?? '#')); ?>">
                                <?= esc($blog['title'] ?? 'Judul tidak tersedia'); ?>
                            </a>
                        </h2>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Belum ada blog yang tersedia.</p>
    <?php endif; ?>
</section>





<!-- Pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination" style="margin-left:100px;">
        <li class="page-item active">
            <a class="page-link" href="#" style="background: linear-gradient(to right, #a12d45, #4660e6); color: white; border-radius: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.2); width: 70px; height: 40px;">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#" style="border-radius: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 70px; height: 40px;">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#" style="border-radius: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 70px; height: 40px;">></a>
        </li>
    </ul>
</nav>

<?= $this->endSection() ?>