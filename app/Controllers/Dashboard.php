<?php

namespace App\Controllers;

use App\Models\PendaftaranAnggotaModel;
use App\Models\BuktiPembayaranModel;


class Dashboard extends BaseController
{
    protected $PendaftaranAnggotaModel;
    protected $BuktiPembayaranModel;
    

    public function __construct()
    {
        $this->PendaftaranAnggotaModel = new PendaftaranAnggotaModel();
        $this->BuktiPembayaranModel = new BuktiPembayaranModel();
        
    }

    public function index()
    {
        

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
        ];

        return view('admin/dashboard', $data); // Mengarah ke views/admin/dashboard.php
    }
}
