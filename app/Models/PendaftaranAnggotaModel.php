<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranAnggotaModel extends Model
{
    protected $table = 'pendaftaran_anggota';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'package_name',
        'package_price',
        'nama_lengkap',
        'email',
        'nomor_hp',
        'domisili',
        'perusahaan',
        'jabatan',
        'alamat_perusahaan',
        'id_type',
        'nomor_id',
        'gender',
        'payment_method',
        'created_at',
    ];

    protected $useTimestamps = false;
}
