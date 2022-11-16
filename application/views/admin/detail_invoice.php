<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Detail Invoice</h1>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;


      foreach ($detail as $detail) { ?>
        <tr>
          <th><?= $no++ ?></th>
          <td><?= $detail->nama_barang ?></td>
          <td><?= $detail->qty ?></td>
          <td>Rp. <?= number_format($detail->harga) ?></td>
        <?php } ?>

        </tr>


        <tr>
          <?php
          $total = $detail->total_harga + $detail->ongkir; ?>
          <td></td>
          <td></td>
          <td>Ongkir</td>
          <td> Rp. <?= number_format($detail->ongkir) ?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Total Harga</td>
          <td>Rp. <?= number_format($total) ?></td>
        </tr>
    </tbody>
  </table>

  <a href="<?= base_url('admin/invoice') ?>" class="btn btn-sm btn-dark mb-3">Kembali</a>
</div>