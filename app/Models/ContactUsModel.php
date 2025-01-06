<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactUsModel extends Model
{
    protected $table      = 'contact_messages';
    protected $primaryKey = 'id';

    protected $allowedFields = ['keperluan', 'pesan']; // Kolom yang dapat diisi
    protected $useTimestamps = false;                  // Aktifkan timestamps
    protected $createdField  = 'created_at';          // Kolom untuk created_at
    protected $updatedField  = 'updated_at';          // Kolom untuk updated_at
}
