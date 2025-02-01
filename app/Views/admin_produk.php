<h3>List of Products</h3>
<hr>
<a href="<?=base_url('produk/input');?>" 
  class="btn btn-primary mb-3">&#128203 Add New Product</a>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead class="table-warning">
      <tr class="text-center">
  		<th scope="col">Picture</th>
  		<th scope="col">Product Id</th>
  		<th scope="col">Product Name</th>
  		<th scope="col">Merk</th>
  		<th scope="col">Price</th>
  		<th scope="col">Quantity</th>
      <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach($qr_produk as $r_produk){
    ?>
      <tr valign="middle">
        <td style="width: 10%;" class="text-center">
        <?php
          if(!$r_produk->gambar_produk){
            $gambar = 'no_image.jpg';
          }else{
            $gambar = $r_produk->gambar_produk;
          }
        ?>
        <img class="w-100 border" src="<?=base_url('public/images/'.$gambar);?>">
          <!--<a href="<?=base_url('produk/upload_pic/'.$r_produk->id_produk);?>" class="btn btn-danger mt-2">
              <?=$gambar == 'no_image.jpg' ? 'UPLOAD':'UBAH'; ?>
            </a>
          -->
            <?php
                if($gambar != 'no_image.jpg'){
            ?>
             <a href="<?=base_url('produk/delete_pic/'.$r_produk->id_produk);?>" class="btn btn-danger mt-2">
                &#128465;
              </a> 
             <a href="<?=base_url('produk/upload_pic/'.$r_produk->id_produk);?>" class="btn btn-warning mt-2">
                &#128394;
              </a>
            <?php
                }else{
            ?>
             <a href="<?=base_url('produk/upload_pic/'.$r_produk->id_produk);?>" class="btn btn-warning mt-2">
                UPLOAD
              </a>
            <?php
                }
            ?>
        </td>
        <td><?=$r_produk->id_produk;?></td>
        <td><?=$r_produk->nama_produk;?></td>
        <td><?=$r_produk->merk_produk;?></td>
        <td>Rp <?=number_format($r_produk->harga_produk);?></td>
        <td align="center"><?=$r_produk->stok_produk;?></td>
        <td align="center">
            <a href="<?=base_url('produk/edit/'.$r_produk->id_produk);?>" 
              type="button" class="btn btn-warning">
              &#128221 Edit
            </a>
            <a data-bs-kode="<?=$r_produk->id_produk;?>" 
            data-bs-ctr="<?=base_url('produk');?>" data-bs-toggle="modal" data-bs-target="#ModalDelete" type="button" class="btn btn-danger">&#128465 Delete</a>
        </td>
      </tr>
    <?php
      }
    ?>
   </tbody>
  </table>
  <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Warning !</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Anda akan menghapus data ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a id="linkdel" href="#" type="button" class="btn btn-primary">Ok</a>
        </div>
      </div>
    </div>
  </div>
</div>