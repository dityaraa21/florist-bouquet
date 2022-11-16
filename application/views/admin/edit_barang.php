<div class="container-fluid">
    <h3>EDIT DATA BARANG</h3>

    <?php foreach($barang as $brg) : ?> 

        <form method="post" action="<?php echo base_url('admin/data_barang/update/'.$brg->id_brg) ?>" enctype="multipart/form-data">
            <div class="for-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
            </div>

            
            <div class="for-group">
                <label>Keterangan</label>
                <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
                <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                    <option><?=$brg->nama?> </option>
                    <?php foreach ($kategori as $key => $kategori) { ?>
                        <option value="<?=$kategori->id_kategori?>"><?=$kategori->nama?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="for-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
            </div>

            <div class="for-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
            </div>
            
            <div class="for-group">
                <label>Berat</label>
                <input type="text" name="berat" class="form-control" value="<?php echo $brg->berat ?>">
            </div>

            <div class="for-group">
                
            <label>Gambar Produk</label><br>
            <img widht="150px" height="150px"src="<?=base_url('uploads/'.$brg->gambar)?>" alt="">
            <input type="file" name="gambar" class="form-control" required>

            </div>



            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
        </form>

    <?php endforeach; ?>
</div>