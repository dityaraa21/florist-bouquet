<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
            <h1>Data Invoice</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Order ID</th>
        <th scope="col">Status Bayar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($psnmsk as $psnmsk) { ?>
        <tr>
          <th><?= $no++ ?></th>
          <td><?= $psnmsk->no_order ?></td>
          <?php if ($psnmsk->status_code == 200) { ?>
               <td> <span class="badge badge-success">Sukses</span></td>
          <?php } else { ?>
            <td> <span class="badge badge-warning">Pending</span></td>
            <?php  } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>