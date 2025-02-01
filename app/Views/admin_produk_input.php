<h3>Input Product</h3>
<hr>
<form novalidate class="needs-validation" method="POST" 
	action="<?=base_url('produk/proses_simpan');?>">
	<div class="mb-3">
		<?php
			foreach($qr_produk as $row){
				$id_produk = $row->id_produk;
			}
			$old_id = substr($id_produk, -3) + 1;
			$new_id = 'PR'.sprintf('%03d', $old_id);
		?>
		<label for="valid01" class="form-label">Product Id</label>
		<input value="<?=$new_id;?>" id="valid01" class="form-control" type="text" 
			name="id" maxlength="5" required>
		<div class="invalid-feedback">
        	Id Produk Tidak Boleh Kosong!
		</div>
	</div>
	<div class="mb-3">
		<label for="valid02" class="form-label">Product Name</label>
		<input id="valid02" class="form-control" type="text" name="nama" 
			maxlength="50" required>
		<div class="invalid-feedback">
        	Nama Produk Harus diisi!
		</div>
	</div>
	<div class="mb-3">
		<label class="form-label">Merk</label>
		<input class="form-control" type="text" name="merk" maxlength="50">
	</div>
	<div class="mb-3">
		<label class="form-label">Price</label>
		<input class="form-control" type="number" name="harga">
	</div>
	<div class="mb-3">
		<label class="form-label">Stock</label>
		<input class="form-control" type="number" name="stok">
	</div>
	<div class="mb-3">
		<input class="btn btn-primary" type="submit" name="submit" value="Save">
		<input class="btn btn-danger" type="reset" name="reset" value="Cancel">
	</div>
</form>