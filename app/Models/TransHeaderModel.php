<?php
namespace App\Models;

use CodeIgniter\Model;

class TransHeaderModel extends Model
{
    protected $table      = 'transaksi_header';
    protected $primaryKey = 'id_theader';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['id_theader','id_pelanggan','trans_date'];
}