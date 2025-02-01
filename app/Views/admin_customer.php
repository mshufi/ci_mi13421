<h3>List of Customers</h3>
<hr>
<a href="<?=base_url('customer/input');?>" 
  class="btn btn-primary mb-3">&#128203 Add New Customer</a>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead class="table-warning">
      <tr class="text-center">
  		<th scope="col">Photo</th>
  		<th scope="col">Customer Id</th>
  		<th scope="col">Customer Name</th>
  		<th scope="col">HP</th>
  		<th scope="col">Gender</th>
  		<th scope="col">Address</th>
      <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach($qr_cus as $r_cus){
    ?>
      <tr valign="middle">
        <td style="width: 10%;">
        <?php
          if(!$r_cus->foto_pelanggan){
            $foto = 'no_image.jpg';
          }else{
            $foto = $r_cus->foto_pelanggan;
          }
        ?>
          <img class="w-100 border" src="<?=base_url('public/images/'.$foto);?>">
        </td>
        <td><?=$r_cus->id_pelanggan;?></td>
        <td><?=$r_cus->nama_pelanggan;?></td>
        <td><?=$r_cus->hp_pelanggan;?></td>
        <td><?=$r_cus->gender_pelanggan;?></td>
        <td align="center"><?=$r_cus->alamat_pelanggan;?></td>
        <td align="center">
            <a href="<?=base_url('customer/edit/'.$r_cus->id_pelanggan);?>" type="button" class="btn btn-warning">&#128221 Edit</a>
            <a data-bs-kode="<?=$r_cus->id_pelanggan;?>" data-bs-toggle="modal" data-bs-ctr="<?=base_url('customer');?>" data-bs-target="#ModalDelete" type="button" class="btn btn-danger">&#128465 Delete</a>
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