<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

class Transaksi extends BaseController
{
    public function index($alert=''){
        $this->TransHeaderModel->join('pelanggan','transaksi_header.id_pelanggan = pelanggan.id_pelanggan');
        $this->TransHeaderModel->orderBy('trans_date','asc');
        $qr_header = $this->TransHeaderModel->get();
        $data['qr_header'] = $qr_header->getResult();
    	$data['page'] = 'admin_transaksi';
        return view('admin_index',$data);
    }

    public function detail($kode=''){
        $this->TransHeaderModel->join('transaksi_detail','transaksi_detail.id_theader = transaksi_header.id_theader');
        $this->TransHeaderModel->join('pelanggan','transaksi_header.id_pelanggan = pelanggan.id_pelanggan');
        $this->TransHeaderModel->where(['transaksi_header.id_theader'=>$kode]);
        $qr = $this->TransHeaderModel->get();
        $data['qr'] = $qr->getResult();
        $data['produk'] = $this->ProdukModel->get()->getResult();
        $data['page'] = 'admin_transaksi_detail';
        return view('admin_index',$data);
    }
}