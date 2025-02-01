<h3>Edit Customer</h3>
<hr>
<?php
	foreach($qr_cus as $row){
		$id = $row->id_pelanggan;
		$nama = $row->nama_pelanggan;
		$hp = $row->hp_pelanggan;
		$gender = $row->gender_pelanggan;
		$alamat = $row->alamat_pelanggan;
	}
?>
<form novalidate class="needs-validation" method="POST" 
	action="<?=base_url('customer/proses_edit/'.$id);?>">
	<div class="mb-3">
		<label for="valid01" class="form-label">Customer Id</label>
		<input value="<?=$id;?>" id="valid01" class="form-control" type="text" 
			name="id" maxlength="5" required>
		<div class="invalid-feedback">
        	Id Customer Tidak Boleh Kosong!
		</div>
	</div>
	<div class="mb-3">
		<label for="valid02" class="form-label">Customer Name</label>
		<input id="valid02" class="form-control" type="text" name="nama" value="<?=$nama;?>" 
			maxlength="50" required>
		<div class="invalid-feedback">
        	Nama Customer Harus diisi!
		</div>
	</div>
	<div class="mb-3">
		<label class="form-label">Phone Number</label>
		<input class="form-control" value="<?=$hp;?>" type="text" name="hp" maxlength="15">
	</div>
	<div class="mb-3">
		<label class="form-label">Gender</label>
		<select class="form-select" name="gender">
			<option <?=$gender=='Laki-laki'?'selected':'' ?> value="Laki-laki">Laki-laki</option>
			<option <?=$gender=='Perempuan'?'selected':'' ?> value="Perempuan">Perempuan</option>
		</select>
	</div>
	<div class="mb-3">
		<label class="form-label">Address</label>
		<input class="form-control" value="<?=$alamat;?>" type="text" name="alamat">
	</div>
	<div class="mb-3">
		<input class="btn btn-primary" type="submit" name="submit" value="Save">
		<input class="btn btn-danger" type="reset" name="reset" value="Cancel">
	</div>
</form>