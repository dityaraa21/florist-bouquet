<div class="bg-light py-3">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mb-0"><a href="<?= base_url("home") ?>">Home</a> <span class="mx-2 mb-0">/</span> <a href="<?= base_url("keranjang") ?>">Keranjang</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Detail Pesanan</strong></div>
        </div>
    </div>
</div>

<div class="container">
    <!-- <h3 class="mt-2">Detail Belanja</h3>
    <table class="table mt-2 mb-2">
        <thead>
            <tr class="text-center">
                <th scope="col">Jumlah</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo $no_order = date('dmy') . strtoupper(random_string('alnum', 10));
            foreach ($this->cart->contents() as $items) {
                $barang = $this->m_barang->getdata($items['id']);
                // $total_barang = $total_barang + 
            ?>
                <tr class="text-center">
                    <th scope="row"><?= $items['qty'] ?></th>
                    <td><?= $items['name'] ?></td>
                    <td>Rp. <?= number_format($items['price'], 0) ?> x <?= $items['qty'] ?></td>
                    <td>Rp. <?= number_format($items['subtotal'], 0) ?></td>
                </tr>
                <td colspan="3" class="text-right">Total Harga</td>
                <td class="text-center">Rp. <?= number_format($this->cart->total(), 0) ?></td>
            <?php } ?>
        </tbody>
    </table> -->

    <!-- Mengambil Api Provinsi dan Kota Asal -->
    <h3>Cek Ongkir</h3>
    <div class="form-row">
        <div class="form-group col-md-6">
            <!-- <label for="from_province">Dari Provinsi </label> -->
            <select hidden="hidden" class="form-control" name="from_province" id="from_province" readonly>
                <!-- <option value="9" selected="" disabled="" ></option> -->
                <option value='9'></option>
                <!-- <?php $this->load->view('rajaongkir/getProvince2'); ?> -->
            </select>
        </div>
        <div class="form-group col-md-6">
            <!-- <label for="from_city">Dari Kota </label> -->
            <select hidden="hidden" class="form-control" name="from_city" id="origin">
                <option value="54"></option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="to_province">Ke Provinsi </label>
            <select class="form-control" name="to_province" id="to_province">
                <option value="" selected="" disabled="">- Pilih Provinsi -</option>
                <?php $this->load->view('rajaongkir/getProvince'); ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="to_city">Ke Kota </label>
            <select class="form-control" name="destination" id="destination">
                <option value="" selected="" disabled="">- Pilih Kota -</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="courier">Kurir </label>
            <select class="form-control" name="courier" id="courier">
                <option value="">- Pilih Kurir -</option>
                <option value="jne">JNE</option>
                <option value="pos">POS</option>
                <option value="tiki">TIKI</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="weight">Berat (gram)</label>
            <input type="text" class="form-control" name="weight" id="weight" value="100">
        </div>
        <div class="form-group col-md-12">
            <div class="panel-body">
                <div id="hasil"></div>
            </div>
        </div>
        <div class="text-right col-md-12">
            <button type="button" onclick="tampil_data('data')" class="btn btn-outline-success">Check</button>
        </div>
    </div>

    <div class="mt-3">
        <h3>Form Input Alamat</h3>
    </div>
    <?php echo form_open('snap'); ?>
    <input name="no_order" type="hidden" value="<?= $no_order ?>">
    <input name="total_harga" type="hidden" value="<?= $this->cart->total() ?>">
    <input name="qty" type="hidden" value="<?= $items['qty'] ?>">
    <input name="nama_barang" type="hidden" value="<?= $items['name'] ?>">
    <div class="row">
        <div class="form-group col-md-6">
            <label>Layanan</label>
            <input type="text" name="layanan" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label>No. Telepon</label>
            <input type="text" name="no_telp" class="form-control" required>
        </div>

        <div class="form-group col-md-12">
            <label>Alamat Lengkap</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>

    </div>

    <div class="text-right">
        <button type="submit" class="btn btn-sm btn-success mb-3">Bayar</button>
    </div>
    <?php echo form_close(); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    function tampil_data(act) {
        var origin = $('#origin').val();
        var destination = $('#destination').val();
        var weight = $('#weight').val();
        var courier = $('#courier').val();

        $.ajax({
            url: "rajaongkir/getCost",
            type: "GET",
            data: {
                origin: origin,
                destination: destination,
                berat: weight,
                courier: courier
            },
            success: function(ajaxData) {
                $("#hasil").html(ajaxData);
            }
        });
    };

    $(document).ready(function() {
        $("#from_province").click(function() {
            $.post("<?= base_url(); ?>rajaongkir/getCity/" + $('#from_province').val(), function(obj) {
                $('#origin').html(obj);
            });
        });

        $("#to_province").click(function() {
            $.post("<?= base_url(); ?>rajaongkir/getCity/" + $('#to_province').val(), function(obj) {
                $('#destination').html(obj);
            });
        });
    });
</script>