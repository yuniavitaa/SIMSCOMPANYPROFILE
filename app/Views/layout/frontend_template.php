<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>PT SIMS</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/SIMS.png" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Charmonman:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&family=Darker+Grotesque:wght@300..900&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- MDB -->
  <link rel="stylesheet" href="assets/css/mdb.min.css" />
  <!-- Style -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <?= $this->renderSection('style') ?>
  <style>
    footer {
      padding-left: 16px;
      padding-right: 16px;
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

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      justify-content: center;
      align-items: center;
      z-index: 1050;
    }

    .modal-content {
      background: #fff;
      width: 90%;
      /* Lebar maksimum 90% layar */
      max-width: 500px;
      /* Batas lebar maksimal 500px */
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      animation: fadeIn 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .close-button {
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #6c757d;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .close-button:hover {
      background-color: #5a6268;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 5px;
      color: #333;
    }

    .close-button {
      background: #00b8d4;
      border: none;
      padding: 10px 20px;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }

    .switch-button {
      background: none;
      border: none;
      color: #00b8d4;
      cursor: pointer;
      text-decoration: underline;
    }

    .profile-avatar {
      width: 32px;
      height: 32px;
      background-color: #4caf50;
      /* Warna background avatar */
      color: #fff;
      /* Warna inisial */
      font-weight: bold;
      /* Tebal inisial */
      text-transform: uppercase;
      /* Inisial dalam huruf besar */
      font-size: 14px;
      /* Ukuran font inisial */
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-black shadow-lg">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <img src="<?= base_url('assets/img/SIMS.png') ?>" height="30" alt="SIMS Logo" loading="lazy" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('service') ?>">Product</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('experience') ?>">Experiences</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('about_us') ?>">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('contact_us') ?>">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('blog') ?>">Blog</a></li>
          <li>
            <a href="<?= base_url('/pendaftaran/nilai-list'); ?>">
              <i class="fas fa-star"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="/pendaftaran/resetNotifikasi" class="nav-link">
              <i class="fa fa-bell"></i>
              <?php if (session()->get('notifikasi') > 0) : ?>
                <span class="badge badge-danger"><?= session()->get('notifikasi') ?></span>
              <?php endif; ?>
            </a>
          </li>
          <li>
            <!-- Profile/Logout Dropdown -->
            <?php if (session()->get('logged_in')): ?>
              <div class="dropdown ms-lg-3">
                <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="profile-avatar d-flex justify-content-center align-items-center rounded-circle me-2">
                    <?php
                    // Get the first and last name from the fullname
                    $fullName = session()->get('fullname');
                    $nameParts = explode(' ', $fullName); // Split the name by spaces
                    $initials = strtoupper(substr($nameParts[0], 0, 1)); // Get the first letter of the first name
                    if (count($nameParts) > 1) {
                      $initials .= strtoupper(substr($nameParts[1], 0, 1)); // Get the first letter of the last name (if available)
                    }
                    echo $initials;
                    ?>
                  </div>
                  <span><?= session()->get('fullname') ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
                  <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
        </ul>
      </div>
    <?php else: ?>
      <a href="<?= base_url('login') ?>" class="btn btn-primary ms-lg-3">Login</a>
    <?php endif; ?>


    </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Main content -->
  <?= $this->renderSection('content') ?>

  <!-- Modal untuk Login -->
  <div id="loginModal" class="modal">
    <div class="modal-content">
      <h2>Silahkan Login Terlebih Dahulu</h2>
      <p>Anda harus login untuk melanjutkan pembelian paket ini.</p>
      <a href="<?= base_url('login') ?>" class="btn btn-primary">Login</a>
      <button class="close-button" onclick="closeModal()">Tutup</button>
    </div>
  </div>


  <!-- Footer -->
  <footer class="text-center text-lg-start text-muted-white pt-1" style="background-color:#000000;">
    <section>
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <a class="navbar-brand" href="#">
              <img src=" <?= base_url('assets/img/SIMS.png') ?>" height="30" alt="SIMS Logo" loading="lazy" />
            </a>
            <p>
              Wisma Kodel Lantai 8, Jl. HR Rasuna Said, Kuningan, Setiabudi, Jakarta Selatan
            </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Kontak</h6>
            <p>
              <a href="#"><img style="margin:5px" src=" <?= base_url('assets/img/icon-footer/Kontak.png') ?>" width="24" height="24" alt="Whatsapp">+6281 **** ****</a>
            </p>
            <p>
              <a href="#"><img style="margin:5px" src=" <?= base_url('assets/img/icon-footer/Gmail.png') ?>" width="24" height="24" alt="Email">sims@gmail.com</a>
            </p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Layanan</h6>
            <p>
              <a href="#"><img style="margin:5px" src=" <?= base_url('assets/img/icon-footer/Internet.png') ?>" width="24" height="24" alt="Internet">Internet</a>
            </p>
            <p>
              <a href="#"><img style="margin:5px" src="<?= base_url('assets/img/icon-footer/coding.png') ?>" width="24" height="24" alt="Email">Pengembangan Aplikasi</a>
            </p>
            <p>
              <a href="#"><img style="margin:5px" src="<?= base_url('assets/img/icon-footer/email.png') ?>" width="24" height="24" alt="Pelatihan">Pelatihan</a>
            </p>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Sosial Media</h6>
            <p>
              <a href="#"><img style="margin:5px" src=" <?= base_url('assets/img/icon-footer/X.png') ?>" width="24" height="24" alt="Twitter">Twitter</a>
            </p>
            <p>
              <a href="http://instagram.com/username"><img style="margin:5px" src=" <?= base_url('assets/img/icon-footer/Instagram.png') ?>" width="24" height="24" alt="Instagram">Instagram</a>
            </p>
          </div>
        </div>
      </div>
    </section>


    <div class="text-start" style="padding-left: 90px; padding-right: 90px;">
      © 2024 PT SIMS. All Rights Reserved
    </div>

  </footer>
  <!-- Footer -->

  <!-- MDB -->
  <script type="text/javascript" src="assets/js/mdb.umd.min.js"></script>
  <?= $this->renderSection('script') ?>
  <!-- Custom scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    var swiper = new Swiper('#swiper-experience', {
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 5, // Number of logos to display at once
      spaceBetween: 30, // Space between logos
      loop: true, // Enable looping of slides
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 2500, // Auto-slide every 2.5 seconds
        disableOnInteraction: false,
      },
    });
  </script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>



  <script>
    // Membuka Modal
    function openModal() {
      document.getElementById("loginModal").style.display = "flex";

    }



    // Menutup Modal
    function closeModal() {
      document.getElementById("loginModal").style.display = "none";
    }

    // Fungsi untuk Mengecek Login
    function continueToPurchase() {
      const isLoggedIn = <?= json_encode(session()->get('logged_in') ?? false) ?>;
      if (!isLoggedIn) {
        openModal(); // Tampilkan modal jika belum login
      } else {
        // Arahkan ke proses pembelian jika sudah login
        window.location.href = "<?= base_url('pendaftaran') ?>";
      }
    }
  </script>

  <!-- AdminLTE JS -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>