<?= $this->extend('layout/frontend_template') ?>

<?= $this->section('style') ?>
<style>
    /* .navbar {
        padding: 0 20px;
    } */
    @media (max-width: 767.98px) {
        .mobile-img-1 {
            order: 2;
            /* Menempatkan gambar pertama di bawah */
        }

        .mobile-img-2 {
            order: 1;
            /* Menempatkan gambar kedua di atas */
        }

        /* Gaya tambahan jika diperlukan */
        .stacked-image-1 {
            margin-bottom: 20px;
            /* Jarak antar gambar */
        }
    }


    body {
        overflow-x: hidden;
    }

    .hero-section {
        position: relative;
        width: 100%;
        height: 100vh;
        background-image: url('<?= base_url('assets/img/Background.png') ?>');
        background-size: cover;
        background-position: center;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* .hero-content {
        z-index: 2;
    } */

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* z-index: 1; */
    }

    .hero-content h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .hero-content p {
        font-size: 1.5rem;
        margin-bottom: 2rem;
    }

    /* .hero-content .btn {
        background-color: transparent;
        border: 1px solid white;
        color: white;
        padding: 0.75rem 2rem;
        text-transform: uppercase;
    } */

    .line {
        width: 7%;
        height: 5px;
        background-color: white;
        margin-top: 1px;
    }

    .section-about-us {
        margin-bottom: 50px;
        /* Sesuaikan dengan ukuran space yang diinginkan */
    }

    .scroll-button {
        text-align: center;
        margin: 20px auto;
        position: relative;
    }

    .scroll-icon {
        width: 40px;
        height: auto;
        transition: transform 0.3s ease-in-out;
    }

    .scroll-button:hover .scroll-icon {
        transform: translateY(5px);
    }

    .scroll-button a {
        color: inherit;
        text-decoration: none;
    }

    .scroll-button i {
        font-size: 40px;
        transition: transform 0.3s ease-in-out;
    }

    .scroll-button:hover i {
        transform: translateY(5px);
    }


    .separator-arrow-up-subtractive {
        position: absolute;
        width: 100vw;
        height: 76.22px;
        /* top: 0; */
        left: 0;
        transform: translateY(-1px);
        background-image: url('<?= base_url('assets/img/Separator2.svg') ?>');
        background-size: contain;
        background-repeat: no-repeat;
    }

    .separator-arrow-down-subtractive {
        position: absolute;
        width: 100vw;
        height: 128px;
        /* top: 0; */
        margin-top: -200px;
        left: 0;
        background-image: url('<?= base_url('assets/img/Separator11.svg') ?>');
        background-size: contain;
        background-repeat: no-repeat;
    }

    .image-stack {
        position: relative;
        width: 100%;
        height: auto;
    }

    .stacked-image-1 {
        position: relative;
        z-index: 1;
        width: 100%;
        /* Gambar pertama menggunakan lebar penuh */
    }

    .stacked-image-2 {
        position: absolute;
        top: 200px;
        /* Gambar kedua lebih ke bawah */
        left: 40px;
        /* Atur posisi horizontal */
        z-index: 1;
        width: 60%;
        /* Buat gambar kedua lebih kecil */
    }

    .gradient-1 {
        background-color: white;
        background-image: linear-gradient(180deg,
                rgba(var(--mdb-body-bg-rgb), 0.01),
                rgba(var(--mdb-body-bg-rgb), 1) 85%),
            radial-gradient(ellipse at top left,
                rgba(var(--mdb-primary-rgb), 0.25),
                transparent 50%),
            radial-gradient(ellipse at top right,
                rgba(var(--mdb-secondary-rgb), 0.25),
                transparent 50%),
            radial-gradient(ellipse at center right,
                rgba(var(--mdb-info-rgb), 0.25),
                transparent 50%),
            radial-gradient(ellipse at center left,
                rgba(var(--mdb-warning-rgb), 0.25),
                transparent 50%);
    }

    .gradient-2 {
        background-color: white;
        background-image: linear-gradient(180deg,
                rgba(var(--mdb-body-bg-rgb), 0.01),
                rgba(var(--mdb-body-bg-rgb), 1) 85%),
            radial-gradient(ellipse at top left,
                rgba(var(--mdb-primary-rgb), 0.25),
                transparent 50%),
            radial-gradient(ellipse at top right,
                rgba(var(--mdb-secondary-rgb), 0.25),
                transparent 50%),
            radial-gradient(ellipse at center right,
                rgba(var(--mdb-info-rgb), 0.25),
                transparent 50%),
            radial-gradient(ellipse at center left,
                rgba(var(--mdb-warning-rgb), 0.25),
                transparent 50%);
    }

    .small-icon {
        height: 100px;
        width: 100px;
    }

    .equal-height {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: rgba(255, 255, 255, 0.3);
    }


    footer {
        padding-left: 15px;
        padding-right: 15px;
        background-color: black;
        color: white;
        justify-content: space-between;
    }

    footer a {
        color: white;
        text-decoration: none;
    }

    footer a:hover {
        color: #ddd;


    }

    @font-face {
        font-family: 'ArcadeFont';
        src: url('assets/font/ARCADE_I.TTF') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    h2 {
        font-family: 'ArcadeFont', sans-serif;

    }

    /* Menyesuaikan container Swiper */
    /* .swiper {
        width: 100%;
        height: 100%;
    } */

    /* Menyesuaikan slide Swiper */
    .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Menyesuaikan gambar agar sesuai dengan container */
    .swiper-slide img {
        max-width: 100%;
        height: auto;
        object-fit: cover;
    }

    /* Lebar dan tinggi khusus */
    .swiper-slide img {
        max-width: 100%;
        max-height: 400px;
        object-fit: cover;
    }

    section {
        width: 100%;
        max-width: 1250px;
    }

    .trusted-section img {
        width: auto;
        height: 80px;
        /* Menyetel tinggi gambar agar seragam */
        object-fit: contain;
        /* Memastikan gambar tetap proporsional */
        margin: 0 auto;
        display: block;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<!-- Hero Section -->
<header class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container" style="z-index: 1;">
        <div class="line"></div>
        <div class="row">
            <!-- <div class="scroll-button">
                <a href="#target-section">
                    <i class="fa fa-chevron-down"></i>
                </a>
            </div> -->
            <div class="col">
                <div class="hero-content">
                    <h1 class="chakra-petch-bold ">Internet Connection</h1>
                    </br>
                    <h1 class="chakra-petch-regular">For People</h1>
                    <p class="arcade-interlaced-regular">Empowering connectivity for tomorrow.</p>
                    <a href="#" class="btn btn-outline-light btn-lg chakra-petch-medium" data-mdb-ripple-init>Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Content for the home page -->
<div class="container text-center pt-5" style="margin-top: 87px;">
    <h2>Our Partner</h2>
    <div class="row">
        <div class="col-md-12 pt-5">
            <img src=" <?= base_url("assets/img/Group 2.png") ?>" alt="Partner 1" class="img-fluid">
        </div>
    </div>
</div>
<!-- About Us -->
<!-- About Us -->
<div class="d-flex flex-column flex-md-row" style="background-image: url('<?= base_url('assets/img/background-tentang-kami.png'); ?>'); background-size: cover; background-position: center top 20%; padding-bottom: 300px; margin-top: 100px;">
    <div class="separator-arrow-up-subtractive z-3 align-self-start"></div>
    <div class="container text-start pt-5">
        <div class="row mt-4">
            <div class="col-md-6 position-relative mobile-img-1 mb-4">
                <img src="<?= base_url('assets/img/image 171.png') ?>" class="img-fluid stacked-image-1" alt="About Us Image" style="transform: rotate(5deg);">
                <img src="<?= base_url('assets/img/image 151.png') ?>" class="img-fluid stacked-image-2" alt="About Us Image" style="transform: rotate(-10deg);">
            </div>
            <div class="col-md-6">
                <h2 class="text-end text-white me-5 mb-5 fs-1">About Us</h2>
                <div class="gradient-1 position-absolute z-3 charmonman-regular p-4 shadow"
                    style="margin-left: -32px;height: 256px;width: calc(50vw - 96px);transform: rotate(-3deg);">
                    <h3>
                        <span class="charmonman-bold">
                            PT SIMS
                        </span>
                        facilitates digital living through access infrastructure, telecommunications networks, and information technology services.
                    </h3>
                    <p class="text-end">Tentang Kami ⊿</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="d-none d-md block">

</section>




<!-- Content for the home page -->
<div class="container text-center pt-5" style="margin-top: 100px;">
    <!-- <div class="separator-arrow-down-subtractive align-self-end"></div> -->
    <div class="row " style="margin-top: -200px;">
        <div class="col-md-3">
            <div class="card text-center equal-height border border-danger rounded-0" style=" background-color: rgba(255, 255, 255, 80%);">
                <img src=" <?= base_url('assets/img/jaringan.png') ?>" class="card-img-top small-icon mx-auto" alt="Partner 1">
                <div class="card-body">
                    <h5 class="card-title">Konektivitas Terluas</h5>
                    <p class="card-text">Jaringan yang luas dan andal, menjangkau berbagai daerah dengan layanan berkualitas tinggi.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center equal-height border border-danger rounded-0" style=" background-color: rgba(255, 255, 255, 80%);">
                <img src=" <?= base_url('assets/img/teknologi.png') ?>" class="card-img-top small-icon mx-auto" alt="Partner 2">
                <div class="card-body">
                    <h5 class="card-title">Teknologi Terkini</h5>
                    <p class="card-text">Teknologi mutakhir untuk memastikan kecepatan, stabilitas, dan efisiensi dalam setiap layanan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center equal-height border border-danger rounded-0" style=" background-color: rgba(255, 255, 255, 80%);">
                <img src="<?= base_url('assets/img/support.png') ?>" class="card-img-top small-icon mx-auto" alt="Partner 3">
                <div class="card-body">
                    <h5 class="card-title">Dukungan Terbaik</h5>
                    <p class="card-text">Layanan pelanggan siap membantu kapan saja, memastikan pengalaman pengguna yang memuaskan dan tanpa hambatan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center equal-height border border-danger rounded-0" style=" background-color: rgba(255, 255, 255, 80%);">
                <img src="<?= base_url('assets/img/inovasi.png') ?>" class="card-img-top small-icon mx-auto" alt="Partner 4">
                <div class="card-body">
                    <h5 class="card-title">Inovasi Berkelanjutan</h5>
                    <p class="card-text">Revolusi teknologi dengan inovasi berkelanjutan memastikan Anda selalu berada di garis depan perkembangan digital.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
<div class="container" style="margin-top: 100px;">
    <div class="swiper gradient-2" id="swiper-experience">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="row w-100">
                    <div class="col-md-4 d-flex flex-column justify-content-center order-2 order-lg-1">
                        <div class="text-start">
                            <p>Experience</p>
                            <div class="text-uppercase">
                                <h3>Regional
                                    </br>
                                    Goverment
                                    </br>
                                    Multimedia TV
                                    </br>
                                    Studio
                                    </br>
                                </h3>
                            </div>
                            <p>April 2024</p>
                        </div>
                    </div>
                    <div class="col-sm-8 order-1 order-lg-2">
                        <img src="<?= base_url('assets/img/Media.png') ?>" alt="Slide 2" class="w-100 object-fit-cover">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="row w-100">
                    <div class="col-sm-4 d-flex flex-column justify-content-center order-2 order-lg-2">
                        <div class="text-start">
                            <p>Experience</p>
                            <div class="text-uppercase">
                                <h3>District Internet
                                    <span>Network [Center</span>
                                    </br>
                                    <span>For Internet</span>
                                    <span>Service Keamatan</span>
                                    </br>
                                    <span>USO]</span>
                                </h3>
                            </div>
                            <p>April 2024</p>
                        </div>
                    </div>
                    <div class="col-md-8 order 2 order-lg-1">
                        <img src="<?= base_url('assets/img/city.png') ?>" alt="Slide 2" class="w-100 object-fit-cover">
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
</br>
<div class="container text-center pt-5 " style="position: relative; top: -200px; margin-top: 200px;">
    <h2 style="margin-bottom: 87px;">TRUSTED BY</h2>
    </br>
    <section class="swiper mySwiper trusted-section">
        <div class="wrapper swiper-wrapper">
            <div class="item swiper-slide">
                <img src="<?= base_url('assets/img/customer/image 5.png') ?>" alt="Logo DIY">
            </div>
            <div class="item swiper-slide">
                <img src="<?= base_url('assets/img/customer/image 6.png') ?>" alt="Logo Kominfo">
            </div>
            <div class="item swiper-slide">
                <img src="<?= base_url('assets/img/customer/image 7.png') ?>" alt="Logo Panti Rapih">
            </div>
            <div class="item swiper-slide">
                <img src="<?= base_url('assets/img/customer/image 8.png') ?>" alt="Logo RSUP Dr.Sardjito">
            </div>
            <div class="item swiper-slide">
                <img src="<?= base_url('assets/img/customer/image 9.png') ?>" alt="Logo Citranet">
            </div>
            <div class="item swiper-slide">
                <img src="<?= base_url('assets/img/customer/image 10.png') ?>" alt="Logo Indosat">
            </div>
            <div class="item swiper-slide">
                <img src="<?= base_url('assets/img/customer/image 11.png') ?>" alt="Logo Hyat Regency">
            </div>
            <div class="item swiper-slide">
                <img src="<?= base_url('assets/img/customer/image 12.png') ?>" alt="Logo UGM">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>
</div>
<br>
</div>


</div>
<?= $this->endSection() ?>