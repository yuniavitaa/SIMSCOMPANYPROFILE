<?php

namespace App\Controllers;

use App\Models\ContactUsModel;

class ContactUs extends BaseController
{
    public function contact_us()
    {
        return view('frontend_contact_us');
    }

    public function saveMessage()
    {
        $model = new ContactUsModel();

        // Ambil data dari POST
        $data = [
            'keperluan' => $this->request->getPost('keperluan'),
            'pesan'     => $this->request->getPost('pesan'),
        ];

        // Insert ke database
        if ($model->insert($data)) {
            // Kembalikan response sukses (dalam format JSON)
            return $this->response->setJSON(['status' => 'success', 'message' => 'Pesan berhasil dikirim']);
        } else {
            // Kembalikan response error
            return $this->response->setJSON(['status' => 'error', 'message' => 'Pesan gagal dikirim']);
        }
    }
    public function index()
    {
        $model = new ContactUsModel();

        // Ambil semua data dari tabel contact_us
        $data = [
            'judul' => 'Contact Us', // Judul halaman
            'menu' => 'masterdata', // Menu yang aktif
            'submenu' => 'contact', // Submenu yang aktif
            'messages' => $model->findAll() // Data dari database
        ];

        // Tampilkan halaman admin dengan DataTables
        return view('admin/contact_list', $data);
    }

    

}
