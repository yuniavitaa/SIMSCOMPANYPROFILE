<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'rating', 'komentar', 'foto', 'video'];

    public function getAllPenilaian()
    {
        return $this->select('penilaian.*, pendaftaran_anggota.package_name, user.fullname')
            ->join('pendaftaran_anggota', 'pendaftaran_anggota.id = penilaian.pendaftaran_id')
            ->join('user', 'user.email = pendaftaran_anggota.email', 'left') // Ubah 'user.id' sesuai kondisi
            ->orderBy('penilaian.created_at', 'DESC')
            ->findAll();
    }
}
