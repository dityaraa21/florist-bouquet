<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="<?= base_url("home") ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Keranjang</strong></div>
        </div>
    </div>
</div>

<div class="container">
    <!-- <?= $this->session->userdata('username') ?>; -->
    <div class="card">
        <div class="card-body">
            <?php
            $no_order = date('dmy') . strtoupper(random_string('alnum', 10));

            foreach ($this->cart->contents() as $items) {
                $barang = $this->m_barang->getdata($items['id']);
                // $total_barang = $total_barang + 
            ?>
                <input name="no_order" type="hidden" value="<?= $no_order ?>">
                <input name="total_harga" type="hidden" value="<?= $this->cart->total() ?>">
                <input name="qty" type="hidden" value="<?= $items['qty'] ?>">
                <input name="nama_barang" type="hidden" value="<?= $items['name'] ?>">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-fluid mt-3" width="120px" height="120px" src="<?= base_url('uploads/' . $barang->gambar) ?>">
                    </div>
                    <div class="col-md-3">
                        <div class="mt-3"><?= $items['name'] ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mt-3"> Rp. <?= number_format($items['price'], 0) ?> x <?= $items['qty'] ?></div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-3"> Total Rp. <?= number_format($items['subtotal'], 0) ?></div>
                    </div>

                </div>
            <?php } ?>
            <div class="text-right">
                <a href="<?= base_url('keranjang/destroy') ?>" class="btn btn-primary">destroy</a>
                <a href="<?= base_url('rajaongkir') ?>" class="btn btn-outline-success">Checkout</a>
            </div>
        </div>
    </div>
</div>