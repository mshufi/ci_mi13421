<?php
namespace App\Models;

use CodeIgniter\Model;

class TransDetailModel extends Model
{
    protected $table      = 'transaksi_detail';
    protected $primaryKey = 'id_tdetail';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['id_tdetail','id_theader',
    	'id_produk','quantity','discount','tax'];
}