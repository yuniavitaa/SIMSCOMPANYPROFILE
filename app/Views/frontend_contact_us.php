<?= $this->extend('layout/frontend_template') ?>
<?= $this->section('style') ?>
<style>
    .navbar {
        padding-right: 16px;
        background-color: white;
        color: black;
        justify-content: space-between;
    }

    .navbar a {
        color: black;
        text-decoration: none;
    }

    .navbar-nav .nav-link {
        color: black;
        /* Warna teks hitam */
    }

    footer a:hover {
        color: #ddd;
    }

    .contact-section {
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

    .office-section {
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

    .social-media {
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
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/img/SIMS.png') ?>" height="30" alt="SIMS Logo" loading="lazy" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('service') ?>">Services</a></li>
                        <li><a class="dropdown-item" href="https://lifemedia.id/" target="_blank">Life Media</a></li>
                        <li><a class="dropdown-item" href="https://www.sportlinknews.com/" target="_blank">Sportlinknews</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('experience') ?>">Experiences</a>
                </li>
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
                            <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser">
                                <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
            </ul>
        </div>
    <?php else: ?>
        <a href="<?= base_url('login') ?>" class="btn btn-primary ms-lg-3">Login</a>
    <?php endif; ?>
    </ul>
    </div>
    </div>

</nav>
<!-- Contact Form Section -->
<!-- Contact Form Section -->
<section class="contact-section py-5">
    <div class="container">
        <h2 class="mb-4 chakra-petch-bold" style="margin-top: 100px;">Hubungi Kami</h2>
        <div class="row">
            <div class="col-lg-6">
                <form id="contactForm" method="POST">
                    <div class="mb-3" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <input type="text" class="inter-reguler form-control" id="keperluan" name="keperluan" placeholder="Keperluan" required>
                    </div>
                    <div class="mb-3" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <textarea class="inter-reguler form-control" id="pesan" name="pesan" rows="3" placeholder="Pesan" required></textarea>
                    </div>
                    <div class="col-md-4">
                        <div class="border p-2" style="background-color: white; border-color: #ccc;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="notRobot" name="notRobot" required>
                                <label class="form-check-label" for="notRobot">Saya bukan robot</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-light mt-3" style="background-color: white; border-color: #ccc;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);">Kirim</button>
                </form>
                <div id="responseMessage" style="margin-top: 20px;"></div> <!-- Tempat untuk menampilkan pesan sukses -->
            </div>
        </div>
    </div>
</section>


<!-- Office Section -->
<section class="office-section py-5">
    <div class="container text-center">
        <h3 class="arcade-interlaced-regular">OFFICE</h3>
        <p class="chakra-petch-regular">Wisma Kodel 8th Floor, Jl. HR Rasuna Said, <br> Kuningan, Setiabudi, Jakarta Selatan</p>
        <h5 class="chakra-petch-bold">Work Hour </h5>
        <p class="chakra-petch-regular">Monday – Friday: 9:00AM – 5:00PM<br>Saturday & Sunday: 11:00AM – 3:00PM</p>
        <div id="map" class="my-2">
            <div style="position: relative; padding-bottom: 10%; height: 0; overflow: hidden; max-width: 100%; height: auto;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.550211914924!2d106.8232843!3d-6.1908873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f426bb4690fd%3A0x69328b07b4962966!2sPT%20Saranainsan%20Muda%20Selaras!5e0!3m2!1sid!2sid!4v1726547709893!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
</section>

<!-- Tambahkan kode JavaScript untuk AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Tangani pengiriman form menggunakan AJAX
        $('#contactForm').submit(function(e) {
            e.preventDefault(); // Mencegah halaman melakukan reload

            // Mengambil data dari form
            var formData = $(this).serialize();

            // Mengirim data ke controller menggunakan AJAX
            $.ajax({
                url: '<?= site_url('contact_us/save') ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Menampilkan pesan sukses tanpa mengubah halaman
                    $('#responseMessage').html('<div class="alert alert-success">Pesan berhasil dikirim!</div>');

                    // Kosongkan form setelah berhasil
                    $('#contactForm')[0].reset();
                },
                error: function() {
                    // Menampilkan pesan error jika terjadi masalah
                    $('#responseMessage').html('<div class="alert alert-danger">Terjadi kesalahan, pesan gagal dikirim.</div>');
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>