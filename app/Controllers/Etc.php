<?php

namespace App\Controllers;

class Etc extends BaseController
{
    public function index()
    {
    	redirect()->to(base_url());
    }

    public function alert_msg($status=''){
    	if($status == 'edit-sukses'){
            $data['on'] = 'show';
            $data['tema'] = 'bg-success';
            $data['judul'] = 'Update Berhasil';
            $data['pesan'] = 'Data yang anda Pilih Berhasil dirubah';
        }elseif($status == 'input-sukses'){
            $data['on'] = 'show';
            $data['tema'] = 'bg-success';
            $data['judul'] = 'Input Berhasil';
            $data['pesan'] = 'Anda berhasil menyimpan data baru';
        }elseif($status == 'delete-sukses'){
            $data['on'] = 'show';
            $data['tema'] = 'bg-success';
            $data['judul'] = 'Delete Berhasil';
            $data['pesan'] = 'Anda Menghapus Data';
        }else{
			$data['on'] = '';
            $data['tema'] = '';
            $data['judul'] = '';
            $data['pesan'] = '';
        }
        return $data;
    }
}
