<?php

namespace App\Controllers;

use App\Models\PaketLayananModel;

class PaketLayanan extends BaseController
{
    protected $paketLayananModel;
    public function index()
    {
        $model = new PaketLayananModel();

        // Ambil semua data layanan dari database
        $data['paket_layanan'] = $model->findAll();

        // Kirim data ke view
        return view('frontservice', $data);
    }
}
