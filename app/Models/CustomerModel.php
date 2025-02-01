<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['id_pelanggan', 'nama_pelanggan','hp_pelanggan',
        'gender_pelanggan','alamat_pelanggan','foto_pelanggan','last_update_pelanggan'];
}