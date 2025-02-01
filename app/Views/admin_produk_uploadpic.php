<h3>Upload Gambar Produk</h3>
<hr>
    <?php
      foreach($qr_produk as $r_produk){
          if(!$r_produk->gambar_produk){
            $gambar = 'no_image.jpg';
          }else{
            $gambar = $r_produk->gambar_produk;
          }
        }
       ?>
<div class="row">
	<div class="col-3 p-3 border">
		<form method="POST" action="<?=base_url('produk/proses_upload_pic/'.$id);?>" enctype="multipart/form-data">
		<img class="w-100 border" src="<?=base_url('public/images/'.$gambar);?>">
			<input class="form-control" type="file" name="uploadpic"  id="uploadpic" accept="image/*">
			<input class="btn btn-primary w-100 mt-2" type="submit" name="ok" value="OK">
		</form>
	</div>
</div>