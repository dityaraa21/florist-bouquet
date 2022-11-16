<?php
$no_order = date('dmy') . strtoupper(random_string('alnum', 10));
?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?= base_url("home") ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Detail Produk</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url('uploads/' . $detailproduk->gambar) ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">


                <h2 class="text-black"><?= $detailproduk->nama_brg ?></h2>
                <p>
                    <?= $detailproduk->keterangan ?>
                </p>
                <p><strong class="text-primary h4">Rp <?= number_format($detailproduk->harga) ?></strong></p>
                <div class="mb-5">
                    <?php echo
                    form_open('keranjang/add'); ?>
                    <input name="nama_barang" type="hidden" value="<?= $detailproduk->nama_brg ?>">
                    <input name="harga" type="hidden" value="<?= $detailproduk->harga ?>">
                    <input name="id_brg" type="hidden" value="<?= $detailproduk->id_brg ?>">

                    <small>Sisa Stok <?= $detailproduk->stok ?></small>
                    <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" name="qty" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

                        <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>

                        </div>
                    </div>

                </div>
                <p><button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button></p>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>