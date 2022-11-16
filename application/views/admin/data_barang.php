<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
            <h1>Data Barang</h1>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container-fluid">
    <button class="btn btn-sm btn-dark mb-3 ml-2" data-toggle="modal" data-target="#tambah_barang"><i class="menu-icon ti-plus"> </i> TAMBAH BARANG</button>

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA BARANG</th>
            <th>KETERANGAN</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STOK</th>
            <th>BERAT</th>
            <th>Gambar</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php 
        $no=1; 
        foreach($barang as $brg) : ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $brg->nama_brg ?></td>
            <td><?php echo $brg->keterangan ?></td>
            <td><?php echo $brg->nama ?></td>
            <td><?php echo $brg->harga ?></td>
            <td><?php echo $brg->stok ?></td>
            <td><?php echo $brg->berat ?></td>
            <td class="text-center"><img height="120px" width="120px" src="<?=base_url('uploads/'.$brg->gambar)?>" ></td>
            <td><?php echo anchor('admin/data_barang/detail/' .$brg->id_brg, '<div class="btn btn-success btn-sm"><i class="menu-icon ti-zoom-in"></i></div>') ?></td>
            <td><?php echo anchor('admin/data_barang/edit/' .$brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
            <td><?php echo anchor('admin/data_barang/hapus/' .$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>
           
        <?php endforeach; ?>
    </table>
 </div>

 <!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>

            <div class="form-group">
                <label>Kategori</label>

                <select class="form-control" name="kategori">
                  <option> -- Pilih -- </option>
                  <?php foreach ($kategori as $key => $kategori) { ?>
                     <option value="<?=$kategori->id_kategori?>"><?=$kategori->nama?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control">
            </div>
            
            <div class="form-group">
                <label>Berat</label>
                <input type="text" name="berat" class="form-control">
            </div>

            <div class="form-group">
                <label>Gambar Produk</label><br>
                <input type="file" name="gambar" class="form-control">
            </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>  
    </div>
  </div>
</div>