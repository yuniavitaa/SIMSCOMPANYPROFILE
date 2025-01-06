<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'posting'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'image', 'category', 'created_at', 'updated_at'];
}
