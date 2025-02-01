<h3>Input Customer</h3>
<hr>
<form novalidate class="needs-validation" method="POST" 
	action="<?=base_url('customer/proses_simpan');?>">
	<div class="mb-3">
		<?php
			foreach($qr_cus as $row){
				$id_pelanggan = $row->id_pelanggan;
			}
			$old_id = substr($id_pelanggan, -3) + 1;
			$new_id = 'CS'.sprintf('%03d', $old_id);
		?>
		<label for="valid01" class="form-label">Customer Id</label>
		<input value="<?=$new_id;?>" id="valid01" class="form-control" type="text" 
			name="id" maxlength="5" required>
		<div class="invalid-feedback">
        	Id Customer Tidak Boleh Kosong!
		</div>
	</div>
	<div class="mb-3">
		<label for="valid02" class="form-label">Customer Name</label>
		<input id="valid02" class="form-control" type="text" name="nama" 
			maxlength="50" required>
		<div class="invalid-feedback">
        	Nama Customer Harus diisi!
		</div>
	</div>
	<div class="mb-3">
		<label class="form-label">Phone Number</label>
		<input class="form-control" type="text" name="hp" maxlength="15">
	</div>
	<div class="mb-3">
		<label class="form-label">Gender</label>
		<select class="form-select" name="gender">
			<option value="Laki-laki">Laki-laki</option>
			<option value="Perempuan">Perempuan</option>
		</select>
	</div>
	<div class="mb-3">
		<label class="form-label">Address</label>
		<input class="form-control" type="text" name="alamat">
	</div>
	<div class="mb-3">
		<input class="btn btn-primary" type="submit" name="submit" value="Save">
		<input class="btn btn-danger" type="reset" name="reset" value="Cancel">
	</div>
</form>