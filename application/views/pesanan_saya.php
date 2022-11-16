<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">No Order</th>
      <th scope="col">Status Pembayaram</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $i=1; foreach ($pesanan as $key => $pesanan) { ?>
        <tr>
               <th scope="row"><?php echo $i++ ?></th>
               <td><?=$pesanan->no_order?></td>
               <?php if($pesanan->status_code == 201){?>
               <td>Pending</td>
               <?php } else { ?>
                <td>Sukses</td>
               <?php }?>
            </tr>
      <?php  } ?>
   
    
  </tbody>
</table>
    <!-- <a id="pay-button" href="" class="btn btn-primary mt-3">Bayar</a> -->
</div>