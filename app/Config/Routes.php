<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Default route
$routes->get('/', 'Home::index');


// User Authentication Routes
$routes->get('login', 'User::login');
$routes->get('register', 'User::register');
$routes->get('user', 'User::index');
$routes->post('user/regis', 'User::regis');
$routes->post('user/loginProcess', 'User::loginProcess');
$routes->get('/logout', 'User::logout');

$routes->get('/admin/user', 'User::listUsers');
$routes->get('/admin/user/create', 'User::createUser'); // Form create
$routes->post('/admin/user/create', 'User::createUser'); // Proses create
// Route GET untuk menampilkan form edit
$routes->get('/admin/user/edit/(:num)', 'User::editUser/$1');

// Route POST untuk mengupdate data user
$routes->post('/admin/user/edit/(:num)', 'User::editUser/$1');

$routes->get('/admin/user/delete/(:num)', 'User::deleteUser/$1'); // Proses delete










// Service Routes
$routes->get('service', 'Service::service');
$routes->get('pay_tv_services', 'Service::pay_tv_services');
$routes->get('high_speed_internet_access', 'Service::high_speed_internet_access');
$routes->get('vpn_services', 'Service::vpn_services');
$routes->get('vpn_services/form', 'Service::vpn_form'); // Form VPN
$routes->get('bts_hotel', 'Service::bts_hotel');
$routes->get('dark_viber_connection', 'Service::dark_viber_connection');
$routes->get('data_center', 'Service::data_center');
$routes->get('vsat', 'Service::vsat');
$routes->get('training', 'Service::training');

// Payment Routes
$routes->get('payment', 'Payment::index');
$routes->post('payment/Kabupaten', 'Payment::Kabupaten');
$routes->post('payment/Kecamatan', 'Payment::Kecamatan');
$routes->post('payment/simpan', 'Payment::simpan');


// Blog Routes User 
$routes->get('blog', 'BlogController::index'); // Menampilkan daftar blog
$routes->get('blog/(:num)', 'BlogController::detail/$1'); // Menampilkan detail blog berdasarkan ID
// Blog Admin
$routes->get('/admin/blog', 'BlogController::adminIndex'); // Menampilkan daftar blog di admin
$routes->get('/admin/blog/create', 'BlogController::create'); // Form create
$routes->post('/admin/blog/store', 'BlogController::store'); // Proses create
$routes->get('/admin/blog/edit/(:num)', 'BlogController::edit/$1'); // Form edit
$routes->post('/admin/blog/update/(:num)', 'BlogController::update/$1'); // Proses edit

$routes->get('/admin/blog/delete/(:num)', 'BlogController::deleteBlog/$1'); // Hapus blog



// Experience and About Us Routes
$routes->get('experience', 'Experience::experience');
$routes->get('about_us', 'AboutUs::about_us');

// Contact Us Routes
$routes->get('contact_us', 'ContactUs::contact_us');
$routes->post('contact_us/save', 'ContactUs::saveMessage');
$routes->get('admin/contact-us', 'ContactUs::index');



// form pendaftaran dan upload bukti
$routes->get('/pendaftaran', 'PendaftaranAnggota::index');
$routes->post('/pendaftaran/kirim', 'PendaftaranAnggota::kirim');
$routes->get('pendaftaran/uploadBukti', 'PendaftaranAnggota::uploadBukti');
$routes->get('/pendaftaran/uploadBukti/(:num)', 'PendaftaranAnggota::uploadBukti/$1');
$routes->post('/pendaftaran/prosesUploadBukti', 'PendaftaranAnggota::prosesUploadBukti');
$routes->get('/pendaftaran/riwayatPembelian', 'PendaftaranAnggota::riwayatPembelian');
$routes->get('/pendaftaran/riwayatPembelian', 'PendaftaranAnggota::riwayatPembelian');
$routes->post('pendaftaran-anggota/kirim', 'PendaftaranAnggota::kirim');
$routes->post('/pendaftaran-anggota/prosesUploadBukti', 'PendaftaranAnggota::prosesUploadBukti'); // Tambahkan ini

$routes->get('/pendaftaran/detailRiwayat/(:num)', 'PendaftaranAnggota::detailRiwayat/$1');

$routes->post('/pendaftaran/setPackage', 'PendaftaranAnggota::setPackage');
$routes->get('uploads/(:any)', function ($file) {
    $path = WRITEPATH . 'uploads/' . basename($file); // Hindari traversal direktori
    if (file_exists($path)) {
        $mime = mime_content_type($path);
        header('Content-Type: ' . $mime);
        header('Content-Length: ' . filesize($path));
        readfile($path);
        exit;
    } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
});
$routes->post('/pendaftaran/prosesUploadBukti', 'PendaftaranAnggota::prosesUploadBukti');
// app/Config/Routes.php
$routes->get('/pendaftaran/uploadBukti/(:num)', 'PendaftaranAnggota::uploadBukti/$1');

$routes->get('/pendaftaran/resetNotifikasi', 'PendaftaranAnggota::resetNotifikasi');

//pendaftran admin 

$routes->get('/pendaftaran/daftar', 'PendaftaranAnggota::daftar');
$routes->get('/pendaftaran/detail/(:num)', 'PendaftaranAnggota::detail/$1');
$routes->get('/pendaftaran/hapus/(:num)', 'PendaftaranAnggota::hapus/$1');

// Menampilkan daftar pembayaran untuk admin
$routes->get('/pendaftaran/daftarPembayaran', 'PendaftaranAnggota::daftarPembayaran');


$routes->post('/admin/updateStatus/(:num)', 'PendaftaranAnggota::updateStatus/$1');
$routes->get('/admin/riwayat', 'PendaftaranAnggota::riwayat');



// Dashboard Route
$routes->get('dashboard', 'Dashboard::index');

$routes->get('admin/dashboard', 'Dashboard::index');


$routes->get('/pendaftaran/riwayatPembelian/verifyOrder/(:num)', 'PendaftaranAnggota::verifyOrder/$1');

$routes->get('/admin/logout', 'User::logout');


///Penilaian
$routes->post('/pendaftaran/selesai/(:num)', 'PendaftaranAnggota::selesai/$1');
$routes->get('/pendaftaran/nilai/(:num)', 'PendaftaranAnggota::beriNilai/$1');
$routes->post('/pendaftaran/prosesNilai', 'PendaftaranAnggota::prosesNilai');
$routes->get('pendaftaran/nilai-list', 'PendaftaranAnggota::nilaiList');
$routes->post('pendaftaran/prosesNilai', 'PendaftaranAnggota::prosesNilai');
$routes->get('nilai-list', 'PendaftaranAnggota::nilaiList');


// 📌 Route untuk Penilaian (AdminLTE)
$routes->get('/pendaftaran/penilaian', 'PendaftaranAnggota::listPenilaian');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
