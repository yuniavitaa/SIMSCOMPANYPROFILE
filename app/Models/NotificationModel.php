<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications'; // Nama tabel notifikasi
    protected $primaryKey = 'id';       // Primary key tabel

    protected $allowedFields = [
        'title',
        'message',
        'created_at',
    ]; // Kolom yang bisa diisi

    protected $useTimestamps = true;    // Aktifkan timestamps (created_at, updated_at)
    protected $createdField = 'created_at'; // Kolom created_at
    protected $updatedField = null;        // Tidak menggunakan updated_at
}
