<h3>Transaction List</h3>
<hr>
<a href="#" 
  class="btn btn-primary mb-3">&#128203 Add New Transaction</a>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead class="table-warning">
      <tr class="text-center">
    		<th scope="col">Transaction Code</th>
    		<th scope="col">Customer</th>
    		<th scope="col">Transaction Date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($qr_header as $row) {
    ?>
      <tr valign="middle">
        <td align="center"><?=$row->id_theader;?></td>
        <td align="center">
          (<?=$row->id_pelanggan;?>) <?=$row->nama_pelanggan;?>
        </td>
        <td align="center">
          <?php $tbl_date = date_create($row->trans_date); ?>
          <?=date_format($tbl_date,'d F Y (H:i:s)');?>
        </td>
        <td align="center">
            <a href="<?=base_url('transaksi/detail/'.$row->id_theader);?>" type="button" class="btn btn-primary">
              &#128195 Detail
            </a>
            <a href="#" type="button" class="btn btn-warning">&#128221 Edit</a>
            <a type="button" class="btn btn-danger">&#128465 Delete</a>
        </td>
      </tr>
      <?php
        }
      ?>
   </tbody>
  </table>