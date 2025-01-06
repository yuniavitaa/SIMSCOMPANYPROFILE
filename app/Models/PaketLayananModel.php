<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketLayananModel extends Model
{
    protected $table = 'paket_layanan'; // Nama tabel di database
    protected $primaryKey = 'id';       // Primary key dari tabel

    protected $allowedFields = [
        'nama_paket',
        'harga',
        'deskripsi',
        'created_at'
    ];

    protected $useTimestamps = true;      // Aktifkan created_at dan updated_at otomatis
    protected $createdField  = 'created_at'; // Kolom untuk created_at
    protected $updatedField  = 'updated_at'; // Kolom untuk updated_at
}
