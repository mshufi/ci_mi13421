<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

class Produk extends BaseController
{
    public function index($alert=''){
        $etc = new Etc;
        $data_alert = $etc->alert_msg($alert);
        $data['data_alert'] = $data_alert;

        $this->ProdukModel->orderBy('last_update_produk','desc');
    	$qr_produk = $this->ProdukModel->get();
    	$data['qr_produk'] = $qr_produk->getResult();
    	$data['page'] = 'admin_produk';
        return view('admin_index',$data);
    }

    public function input(){
        $this->ProdukModel->select('id_produk');
        $this->ProdukModel->limit(1);
        $this->ProdukModel->orderBy('id_produk','DESC');
        $qr_produk = $this->ProdukModel->get();

        $data['qr_produk'] = $qr_produk->getResult();
    	$data['page'] = 'admin_produk_input';
        return view('admin_index',$data);
    }

    public function proses_simpan(){
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $merk = $this->request->getPost('merk');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');

        $data = array('id_produk'=>$id,
                'nama_produk'=>$nama, 'merk_produk'=>$merk,
                'harga_produk'=>$harga, 'stok_produk'=>$stok,
                'last_update_produk'=>date('Y-m-d H:i:s'));
        $this->ProdukModel->insert($data);
        return redirect()->to(base_url('produk/index/input-sukses'));
    }

    public function proses_delete($kode=''){
        $this->ProdukModel->where(['id_produk'=>$kode]);
        $this->ProdukModel->delete();
        return redirect()->to(base_url('produk/index/delete-sukses'));
    }

    public function edit($kode=''){
        $this->ProdukModel->where(['id_produk'=>$kode]);
        $qr_produk = $this->ProdukModel->get();

        $data['qr_produk'] = $qr_produk->getResult();
        $data['page'] = 'admin_produk_edit';
        return view('admin_index',$data);
    }

    public function proses_edit($kode=''){
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $merk = $this->request->getPost('merk');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');

        $data = array('id_produk'=>$id,
                'nama_produk'=>$nama, 'merk_produk'=>$merk,
                'harga_produk'=>$harga, 'stok_produk'=>$stok,
                'last_update_produk'=>date('Y-m-d H:i:s'));
        $this->ProdukModel->set($data);
        $this->ProdukModel->where(['id_produk'=>$kode]);
        $this->ProdukModel->update();
        return redirect()->to(base_url('produk/index/edit-sukses'));
    }

    public function upload_pic($kode=''){
        $this->ProdukModel->where(['id_produk'=>$kode]);
        $data['id'] = $kode;
        $data['qr_produk'] = $this->ProdukModel->get()->getResult();
        $data['page'] = 'admin_produk_uploadpic';
        return view('admin_index',$data);
    }

    public function proses_upload_pic($kode = ''){
        $validationRule = [
            'uploadpic' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[uploadpic]',
                    'is_image[uploadpic]',
                    'mime_in[uploadpic,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_dims[uploadpic,1024,768]'
                ],
            ],
        ];
        if (! $this->validateData([], $validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            dd($data);
        }

        $img = $this->request->getFile('uploadpic');

        if (! $img->hasMoved()) {
            $nImg = explode('.', $img->getName());
            $new_name = 'img_'.$kode.'.'.$nImg[1];
            $filepath = $img->move(ROOTPATH.'/public/images/',$new_name,true);
            $data = ['gambar_produk'=>$new_name];
            $this->ProdukModel->set($data);
            $this->ProdukModel->where(['id_produk'=>$kode]);
            $this->ProdukModel->update();
            $data = ['uploaded_fileinfo' => new File($filepath)];
            return redirect()->to(base_url('produk/index/input-sukses'));
        }
        $data = ['errors' => 'The file has already been moved.'];
        dd($data);
    }

    public function delete_pic($kode=''){
        $this->ProdukModel->where(['id_produk'=>$kode]);
        $qr = $this->ProdukModel->get()->getResult();
        foreach($qr as $row){
            $gambar = $row->gambar_produk;
        }
        @unlink(ROOTPATH.'/public/images/'.$gambar);

        $this->ProdukModel->where(['id_produk'=>$kode]);
        $this->ProdukModel->set(['gambar_produk'=>'']);
        $this->ProdukModel->update();
        return redirect()->to(base_url('produk/index/delete-sukses'));
    }

}