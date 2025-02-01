<?php

namespace App\Controllers;

class Customer extends BaseController
{
    public function index($alert=''){
        $etc = new Etc;
        $data_alert = $etc->alert_msg($alert);
        $data['data_alert'] = $data_alert;

    	$qr_cus = $this->CustomerModel->get();
    	$data['qr_cus'] = $qr_cus->getResult();
    	$data['page'] = 'admin_customer';
        return view('admin_index',$data);
    }

    public function input(){
        $this->CustomerModel->select('id_pelanggan');
        $this->CustomerModel->limit(1);
        $this->CustomerModel->orderBy('id_pelanggan','DESC');
        $qr_cus = $this->CustomerModel->get();

        $data['qr_cus'] = $qr_cus->getResult();
    	$data['page'] = 'admin_customer_input';
        return view('admin_index',$data);
    }

    public function proses_simpan(){
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $hp = $this->request->getPost('hp');
        $gender = $this->request->getPost('gender');
        $alamat = $this->request->getPost('alamat');

        $data = array('id_pelanggan'=>$id,
                'nama_pelanggan'=>$nama, 'hp_pelanggan'=>$hp,
                'gender_pelanggan'=>$gender, 'alamat_pelanggan'=>$alamat,
                'last_update_pelanggan'=>date('Y-m-d H:i:s'));
        $this->CustomerModel->insert($data);
        return redirect()->to(base_url('customer/index/input-sukses'));
    }

    public function proses_delete($kode=''){
        $this->CustomerModel->where(['id_pelanggan'=>$kode]);
        $this->CustomerModel->delete();
        return redirect()->to(base_url('customer/index/delete-sukses'));
    }

    public function edit($kode=''){
        $this->CustomerModel->where(['id_pelanggan'=>$kode]);
        $qr_cus = $this->CustomerModel->get();

        $data['qr_cus'] = $qr_cus->getResult();
        $data['page'] = 'admin_customer_edit';
        return view('admin_index',$data);
    }

    public function proses_edit($kode=''){
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $hp = $this->request->getPost('hp');
        $gender = $this->request->getPost('gender');
        $alamat = $this->request->getPost('alamat');

        $data = array('id_pelanggan'=>$id,
                'nama_pelanggan'=>$nama, 'hp_pelanggan'=>$hp,
                'gender_pelanggan'=>$gender, 'alamat_pelanggan'=>$alamat,
                'last_update_pelanggan'=>date('Y-m-d H:i:s'));
        $this->CustomerModel->set($data);
        $this->CustomerModel->where(['id_pelanggan'=>$kode]);
        $this->CustomerModel->update();
        return redirect()->to(base_url('customer/index/edit-sukses'));
    }
}