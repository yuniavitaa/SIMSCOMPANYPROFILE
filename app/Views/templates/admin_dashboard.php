<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE | Dashboard</title>
  <base href="<?= base_url('AdminLTE-master/') ?>/">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('dashboard') ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/user') ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/pendaftaran/daftar') ?>" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>Daftar Pendaftaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/pendaftaran/daftarPembayaran') ?>" class="nav-link <?= (current_url() == base_url('/pendaftaran/daftarPembayaran')) ? 'active' : '' ?>">
                <i class="nav-icon fas fa-file-upload"></i>
                <p>Bukti Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/admin/riwayat') ?>" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>Riwayat Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('/pendaftaran/penilaian') ?>" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>Rating</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/contact-us') ?>" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Contact Us</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/blog') ?>" class="nav-link">
                <i class="nav-icon fas fa-blog"></i>
                <p>Blog</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>


          </ul>
        </nav>
      </div>
    </aside>
    <!-- /.sidebar -->

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <?= $this->renderSection('content') ?>
        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <footer class="main-footer text-center">
      <strong>&copy; 2024 Admin Panel.</strong> All rights reserved.
    </footer>
  </div>

  <!-- Scripts -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#contactTable').DataTable();
    });
  </script>
</body>

</html>