<h3>Transaction Detail ###</h3>
<hr>
<?php
  foreach($qr as $row_head){
    $nama = $row_head->nama_pelanggan;
    $hp = $row_head->hp_pelanggan;
    $alamat = $row_head->alamat_pelanggan;
  }
?>
<div class="border border-2 p-2 fs-4 mb-2">
  <div>Customer Name <span class="text-success">(<?=$nama;?>)</span></div>
  <div>Phone Number <span class="text-success">(<?=$hp;?>)</span></div>
  <div>Address <span class="text-success">(<?=$alamat;?>)</span></div>
</div>
<a href="#" 
  class="btn btn-warning mb-3">&#10133 Add Detail
</a>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead class="table-warning">
      <tr class="text-center">
    		<th scope="col">Product Code</th>
    		<th scope="col">Price</th>
    		<th scope="col">Quantity</th>
        <th scope="col">Discount</th>
        <th scope="col">Tax</th>
        <th scope="col">Sum</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach($qr as $row){
    ?>
      <tr valign="middle">
        <td><?=$row->id_produk;?></td>
        <td>
          <?php
              foreach($produk as $r){
                if($r->id_produk == $row->id_produk){
          ?>
          <?=$r->harga_produk;?>
          <?php
                }
            }
          ?>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td align="center"></td>
        <td align="center">
            <a href="#" type="button" class="btn btn-warning">&#128221 Edit</a>
            <a type="button" class="btn btn-danger">&#128465 Delete</a>
        </td>
      </tr>
      <?php
        }
      ?>
   </tbody>
  </table>