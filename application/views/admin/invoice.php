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
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($invoice as $invoice) { ?>
        <tr>
          <th><?= $no++ ?></th>
          <td><?= $invoice->no_order ?></td>
          <td><?= $invoice->nama_lengkap ?></td>
          <td><?= $invoice->alamat ?></td>
          <td><a href="<?= base_url('admin/invoice/detail/' . $invoice->no_order) ?>" class="btn btn-primary btn-sm">Detail</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>