<?php

namespace App\Controllers;

use App\Models\PendaftaranAnggotaModel;
use App\Models\BuktiPembayaranModel;
use App\Models\NotificationModel;

class Dashboard extends BaseController
{
    protected $PendaftaranAnggotaModel;
    protected $BuktiPembayaranModel;
    protected $NotificationModel;

    public function __construct()
    {
        $this->PendaftaranAnggotaModel = new PendaftaranAnggotaModel();
        $this->BuktiPembayaranModel = new BuktiPembayaranModel();
        $this->NotificationModel = new NotificationModel(); // Tambahkan model notifikasi
    }

    public function index()
    {
        // Ambil notifikasi terbaru
        $notifications = $this->NotificationModel->findAll();

        $data = [
            'judul' => 'Dashboard',
            'page' => 'dashboard',
            'menu' => 'dashboard',
            'submenu' => '',
            'total_pendaftar' => $this->PendaftaranAnggotaModel->countAll(),
            'total_sudah_verifikasi' => $this->BuktiPembayaranModel->where('status', 'sudah_verifikasi')->countAllResults(),
            'total_sedang_verifikasi' => $this->BuktiPembayaranModel->where('status', 'sedang_verifikasi')->countAllResults(),
            'total_belum_verifikasi' => $this->BuktiPembayaranModel->where('status', 'belum_valid')->countAllResults(),
            'total_pembayaran' => $this->BuktiPembayaranModel->where('bukti_pembayaran !=', null)->countAllResults(),
            'notifications' => $notifications, // Kirim notifikasi ke view
        ];

        return view('admin/dashboard', $data); // Mengarah ke views/admin/dashboard.php
    }
}
