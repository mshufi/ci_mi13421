<h3>Edit Product</h3>
<hr>
<?php
	foreach($qr_produk as $r_produk){
		$id = $r_produk->id_produk;
		$nama = $r_produk->nama_produk;
		$merk = $r_produk->merk_produk;
		$harga = $r_produk->harga_produk;
		$stok = $r_produk->stok_produk;
	}
?>
<form novalidate class="needs-validation" method="POST" 
	action="<?=base_url('produk/proses_edit/'.$id);?>">
	<div class="mb-3">
		<label for="valid01" class="form-label">Product Id</label>
		<input value="<?=$id?>" id="valid01" class="form-control" type="text" name="id" maxlength="5" required>
		<div class="invalid-feedback">
        	Id Produk Tidak Boleh Kosong!
		</div>
	</div>
	<div class="mb-3">
		<label for="valid02" class="form-label">Product Name</label>
		<input id="valid02" class="form-control" type="text" name="nama" value="<?=$nama;?>" maxlength="50" required>
		<div class="invalid-feedback">
        	Nama Produk Harus diisi!
		</div>
	</div>
	<div class="mb-3">
		<label class="form-label">Merk</label>
		<input class="form-control" type="text" name="merk" maxlength="50" value="<?=$merk;?>">
	</div>
	<div class="mb-3">
		<label class="form-label">Price</label>
		<input class="form-control" type="number" name="harga" value="<?=$harga;?>">
	</div>
	<div class="mb-3">
		<label class="form-label">Stock</label>
		<input class="form-control" type="number" name="stok" value="<?=$stok;?>">
	</div>
	<div class="mb-3">
		<input class="btn btn-primary" type="submit" name="submit" value="Save">
		<input class="btn btn-danger" type="reset" name="reset" value="Cancel">
	</div>
</form>