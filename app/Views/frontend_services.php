<head>
    <?= $this->extend('layout/frontend_template') ?>

    <?= $this->section('style') ?>
    <style>
        body {
            font-family: 'Chakra Petch', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .hero {
            background-image: url('<?= base_url('assets/img/Background.png') ?>');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
        }

        .hero a {
            padding: 12px 30px;
            background-color: #fff;
            color: #000;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;

        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3em;
            margin: 0;

        }

        .hero .btn {
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 0.75rem 2rem;
            text-transform: uppercase;
        }

        .hero .btn:hover {
            background-color: #0056b3;
        }

        .service-section {
            display: flex;
            align-items: center;
            padding: 50px;
            background-color: #f9f9f9;
        }

        .service-content {
            padding: 50px;
            text-align: center;
        }

        .service-content h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .service-content p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .service-content img {
            max-width: 20%;
            height: auto;
        }

        .service-section img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .service-text {
            padding-left: 30px;
        }

        .services-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .service-item {
            position: relative;
            width: 300px;
            height: 200px;
            overflow: hidden;
            border: 1px solid #ddd;
            cursor: pointer;
            transition: transform 0.3s;
            overflow: hidden;
            /* Mencegah konten keluar dari batas elemen */
            box-sizing: border-box;
            /* Memastikan padding dihitung dalam ukuran elemen */
            font-size: 14px;
            /* Sesuaikan ukuran font untuk layar lebih kecil */
        }

        .service-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .service-item:hover img {
            transform: scale(1.1);
        }

        .service-item .service-info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            box-sizing: border-box;
            transition: opacity 0.3s;
            font-family: "Chakra Petch", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .service-item:hover .service-info {
            opacity: 0;
        }

        .service-item .service-slideshow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            opacity: 0;
            transition: opacity 0.3s;
        }

        @media (max-width: 768px) {
            .service-item {
                flex: 1 1 calc(50% - 40px);
            }
        }

        .service-item:hover .service-slideshow {
            opacity: 1;
        }

        /* Membuat container/row pada bagian detail/description web,mobile, web design, payment gateway*/



        .service-slideshow p {
            margin-bottom: auto;
            /* Membuat ruang di antara paragraf dan tombol */
            margin: 0;
            padding: 5px 0;
            /* Kurangi padding untuk menghemat ruang */
            word-wrap: break-word;
            /* Memastikan kata-kata panjang tidak melampaui batas elemen */
            white-space: normal;
            /* Membiarkan teks terbungkus dan tidak melampaui batas */
            font-size: 10px;
            /* Sesuaikan ukuran font untuk layar lebih kecil */
        }

        .middle-red-section {
            background-color: #4D1B28;
            padding: 20vh 0;
        }

        .service-card {
            background-color: rgba(0, 0, 0, 0.5);
            border: 1px solid #ff0066;
            padding: 20px;
            text-align: center;
            position: relative;
            z-index: 1;
            max-width: 100%;
            height: 100%;
            /* Pastikan semua kartu memiliki tinggi penuh */
            display: flex;
            /* Menggunakan flexbox */
            flex-direction: column;
            /* Mengatur arah flex */
            justify-content: space-between;
            /* Menjaga jarak antara elemen */
        }

        .service-card img {
            width: 50px;
            max-width: 100%;
            margin: 0 auto;
            /* Mengatur margin otomatis untuk memusatkan gambar */
            display: block;
            /* Mengatur gambar sebagai block untuk memusatkan */
        }

        .service-card h3 {
            margin-bottom: 10px;
            font-size: 1.2em;
            /* Gunakan em untuk responsivitas */
        }

        .service-card p {
            font-size: 0.9em;
            /* Gunakan em untuk responsivitas */
            margin: 0;
            padding: 0;
            word-wrap: break-word;
        }

        @media (max-width: 576px) {
            .service-card {
                padding: 15px;
                /* Mengurangi padding untuk tampilan mobile */
            }

            .service-card img {
                width: 40px;
                /* Perkecil gambar di layar kecil */
                margin-bottom: 15px;
            }

            .service-card h3 {
                font-size: 1em;
                /* Ukuran font lebih kecil di layar mobile */
            }

            .service-card p {
                font-size: 0.8em;
                /* Ukuran font lebih kecil di layar mobile */
            }
        }

        .service-slideshow {
            padding: 15px;
            text-align: justify;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Untuk menempatkan tombol di bawah */
            height: 100%;
            /* Pastikan kontainer memiliki tinggi penuh */
        }

        .service-slideshow ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc;
            font-size: 10px;
            /* Sesuaikan ukuran font untuk layar lebih kecil */
        }

        .service-slideshow ul li {
            margin-bottom: 5px;
            font-size: 10px;
            /* Sesuaikan ukuran font untuk layar lebih kecil */
        }

        .more-btn {
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 8px 16px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            /* Menambahkan transisi halus */
        }

        .more-btn:hover {
            background-color: transparent;
            color: white;
            border-color: white;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            /* Efek cahaya putih */
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

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

        .text-swiper {
            font-family: 'Arcade Interlaced', sans-serif;
            font-weight: 600;

        }

        #swiper-experience h5 {
            font-family: "Chakra Petch", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        /* atas */
        /* .separator-arrow-down {
        position: absolute;
        width: 100%;
        height: 128px;
        left: 0;
        background-image: url('<?= base_url("assets/img/lay1.svg") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        margin-top: -183px;
    } */

        /* .separator-arrow-down-alt {
        position: absolute;
        width: 100%;
        height: 200px;
        left: 0;
        background-image: url('<?= base_url("assets/img/layer1.svg") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        margin-top: 107px;
    } */

        /* bawah */
        /* .separator-arrow-down-custom {
        position: absolute;
        width: 100%;
        height: 128px;
        left: 0;
        background-image: url('<?= base_url("assets/img/lay1.svg") ?>');
        background-size: contain;
        background-repeat: no-repeat;
        margin-top: -185px;

    } */

        .custom-section {
            background-image: linear-gradient(180deg,
                    rgba(255, 255, 255, 0.01),
                    rgba(255, 255, 255, 0) 85%),
                radial-gradient(ellipse at center left,
                    rgba(128, 0, 128, 0.15),
                    transparent 50%),
                radial-gradient(ellipse at center right,
                    rgba(0, 128, 0, 0.15),
                    transparent 50%),
                radial-gradient(ellipse at center right,
                    rgba(0, 0, 255, 0.15),
                    transparent 50%),
                radial-gradient(ellipse at center left,
                    rgba(255, 192, 203, 0.15),
                    transparent 50%);
            padding: 96px 0;
        }

        .alt-section {
            background-image: linear-gradient(180deg,
                    rgba(255, 255, 255, 0.01),
                    rgba(255, 255, 255, 0) 85%),
                radial-gradient(ellipse at center left,
                    rgba(128, 0, 128, 0.15),
                    transparent 50%),
                radial-gradient(ellipse at center right,
                    rgba(0, 128, 0, 0.15),
                    transparent 50%),
                radial-gradient(ellipse at center right,
                    rgba(0, 0, 255, 0.15),
                    transparent 50%),
                radial-gradient(ellipse at center left,
                    rgba(255, 192, 203, 0.15),
                    transparent 50%);
            padding: 96px 0;
        }
    </style>
</head>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<div class="hero">
    <div class="position-relative z-1 container">
        <div class="row">
            <div class="col">
                <h1 class="fw-bold">Elevate your digital<br>
                    experience to <br>
                    unprecedented heights</h1>
                <p class="fs-6 my-3 arcade-interlaced-regular">Explore our innovative, high-quality superior services</p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<div class="container ">
    <div class="swiper" id="swiper-experience">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="row">
                    <div class="col-sm-8">
                        <img src="<?= base_url('assets/img/swiperpaytv.png') ?>" alt="Slide 1" class="d-block w-100">
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex align-items-center h-100 ">
                            <div>
                                <h4 class="text-swiper mb-4">PAY TV SERVICES</h4>
                                <h5>Digital TV service employs FTTH (fiber To The Home) technology and offers numerous Free To Air and Premium channels.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="row">
                    <div class="col-sm-8">
                        <img src="<?= base_url('assets/img/swiperpaytv.png') ?>" alt="Slide 2" class="d-block w-100">
                    </div>
                    <div class="col-sm-4">
                        <div class="d-flex align-items-center h-100">
                            <div>
                                <h4 class="text-swiper mb-4">DATA CENTER</h4>
                                <h5>Server Collocation equipped with electrical protection in the form of generators, UPS, and Spark Arrester are provided</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>


<div class="container mt-5">
    <div class="services-container">
        <div class="service-item">
            <img src="<?= base_url('assets/img/paytv.png') ?>" alt="Pay TV Service">
            <div class="service-info">
                Pay TV Service
            </div>
            <div class="service-slideshow">
                <p>Digital TV service employs FTTH (Fiber To The Home) technology and offers numerous Free To Air and Premium Channels.</p>
                <a href="<?= base_url('pay_tv_services'); ?>" class="more-btn">Selengkapnya</a>
            </div>
        </div>

        <div class="service-item">
            <img src="<?= base_url('assets/img/highspeed.png') ?>" alt="High Speed Internet Access">
            <div class="service-info">
                High Speed Internet Access
            </div>
            <div class="service-slideshow">
                <p>
                <ul>
                    <li>Shared connections through wired (FTTH) or wireless media</li>
                    <li>Post or Pra Paid Service</li>
                    <li>Dedicated connection through Optical Fiber (PTP) or wireless media</li>
                </ul>
                <a href="<?= base_url('high_speed_internet_access'); ?>" class="more-btn">Selengkapnya</a>
            </div>
        </div>

        <div class="service-item">
            <img src="<?= base_url('assets/img/vpn.png') ?>" alt="VPN Service">
            <div class="service-info">
                VPN Service
            </div>
            <div class="service-slideshow">
                <ul>
                    <li>Virtual Private Network solution with a variety of bandwidth according to needs</li>
                    <li>Feature: MRTG, 24/7 Technical Support</li>
                </ul>
                <a href="<?= base_url('vpn_services'); ?>" class="more-btn">Selengkapnya</a>
            </div>
        </div>

        <div class="service-item">
            <img src="<?= base_url('assets/img/datacenter.png') ?>" alt="Data Center ">
            <div class="service-info">
                Data Center
            </div>
            <div class="service-slideshow">
                <p>Server Collocation equipped with electrical protection in the form of generators, UPS, and Spark Arrester are provided</p>
                <a href="<?= base_url('data_center'); ?>" class="more-btn">Selengkapnya</a>
            </div>
        </div>

        <div class="service-item">
            <img src="<?= base_url('assets/img/darkfiber.png') ?>" alt="Dark Fiber Connection">
            <div class="service-info">
                Dark Fiber Connection
            </div>
            <div class="service-slideshow">
                <p>PTP connection is available to Service Providers Talco Operations</p>
                <a href="<?= base_url('dark_viber_connection'); ?>" class="more-btn">Selengkapnya</a>
            </div>
        </div>

        <div class="service-item">
            <img src="<?= base_url('assets/img/bts.png') ?>" alt="BTS Hotel/Multimedia Micro Cell Pole">
            <div class="service-info">
                BTS Hotel/Multimedia Micro Cell Pole
            </div>
            <div class="service-slideshow">
                <ul>
                    <li>
                        PTP connection from MSC ti MultimediaMicro Cell Pole
                    </li>
                    <li>
                        BTS Hotel
                    </li>
                </ul>

                <a href="<?= base_url('bts_hotel'); ?>" class="more-btn">Selengkapnya</a>
            </div>
        </div>

        <div class="service-item mb-5">
            <img src="<?= base_url('assets/img/vsat.png') ?>" alt="VSAT">
            <div class="service-info">
                VSAT
            </div>
            <div class="service-slideshow">
                <p>Very Small Aperture Terminal (VSAT) service is a solution to accommodatatelecomunications needs in areas notcovered
                    by terrestrial networks for the needs of users with fixed, Maving or Mobile locations
                </p>

                <a href="<?= base_url('vsat'); ?>" class="more-btn">Selengkapnya</a>
            </div>
        </div>

        <div class="service-item mb-5">
            <img src="<?= base_url('assets/img/training.png') ?>" alt="Training">
            <div class="service-info">
                Training
            </div>
            <div class="service-slideshow">
                <p>It is consultation and assistance service in the planning and development of smart city/digital government solutions,
                <p>including training and mentoring services for increasing the capacity of MSMEa in the digital era in order to expand the impact of the digital acosystem</p>

                </p>
                <a href="<?= base_url('training'); ?>" class="more-btn">Selengkapnya</a>
            </div>
        </div>

    </div>

</div>
<br>

<?= view('layout/frontend_product') ?>




<section class="alt-section text-white d-flex" style="background-color: #000; color: white;">
    <div class="separator-arrow-down align-self-start"></div>
    <div class="container" style="padding: 5vh;">
        <div class="row">
            <div class="col text-center">
                <div>
                    <h4 class="arcade-interlaced-semibold">SIMS' SUITE OF VALUE-ADDED SERVICES</h4>
                    <div class="separator-arrow-down-alt align-self-end"></div>
                    <p class="chakra-petch-regular">Improve Your Online Experience with Web and Mobile Applications, Custom Web Design, <br> and Seamless Payment Gateways</p>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="middle-red-section">
    <div class="container pt-5 text-white">
        <div class="row" style="margin-top: -300px;">
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4 d-flex">
                <div class="service-card">
                    <img src="<?= base_url('assets/img/webapp.png') ?>" alt="Web Application Icon" class="img-fluid">
                    <h3 class="chakra-petch-bold">Web Application</h3>
                    <p class="inter-bold">Web applications provide users with a great deal of convenience because they can be accessed from anywhere and at any time and are very simple to use</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4 d-flex">
                <div class="service-card">
                    <img src="<?= base_url('assets/img/mobileapp.png') ?>" alt="Mobile Application Icon" class="img-fluid">
                    <h3 class="chakra-petch-bold">Mobile Application</h3>
                    <p class="inter-bold">The aim of a solution to increase the efficacy of a customer's business process is aided by mobile-based applications that enable highly mobile work</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4 d-flex">
                <div class="service-card">
                    <img src="<?= base_url('assets/img/webdesign.png') ?>" alt="Web Design Icon" class="img-fluid">
                    <h3 class="chakra-petch-bold">Web Design</h3>
                    <p class="inter-bold">With a variety of attractive modules, a website development solution with a design can be tailored to the company's theme and business</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mb-4 d-flex">
                <div class="service-card">
                    <img src="<?= base_url('assets/img/payment.png') ?>" alt="Payment Gateway Icon" class="img-fluid">
                    <h3 class="chakra-petch-bold">Payment Gateway</h3>
                    <p class="inter-bold">Payments can be managed in real time, accurately, and securely with this solution, which facilitates payment methods through multiple banking payment channels</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="custom-section text-white d-flex" style="background-color: #000; color: white;">
    <div class="separator-arrow-down-custom align-self-start"></div>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div>
                    <h1 class="text-center">Get in touch with us today and explore how our service <br> can elevate your multimedia experience</h1>
                    <a href="#" class="btn btn-outline-light btn-lg ">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>