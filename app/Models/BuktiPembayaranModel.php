<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiPembayaranModel extends Model
{
    protected $table = 'bukti_pembayaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id',
        'nama',
        'email',
        'nomor_hp',
        'payment_method', // Tambahkan ini
        'bukti_pembayaran',
        'status',
        'created_at',
        'updated_at',
        'package_name',
        'package_price',
    ];

   public function getRiwayatByEmail($email, $status = null)
{
    $builder = $this->db->table($this->table);
    $builder->where('email', $email);

    if ($status !== null) {
        $builder->where('status', $status);
    }

    return $builder->get()->getResult();  // Menjalankan query dan mengembalikan hasilnya
}


    protected $useTimestamps = false;  // Mengaktifkan pengisian otomatis untuk created_at dan updated_at

    public function getRiwayatPembayaran()
    {
        return $this->findAll(); // Sesuaikan query dengan kebutuhan
    }

    public function updateStatus($id, $status)
    {
        // Perbarui status pembayaran
        return $this->update($id, ['status' => $status]);
    }
}
