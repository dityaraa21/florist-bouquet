<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-6Z0whkA30QVi-vk6"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<div class="bg-light py-3">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mb-0"><a href="<?= base_url("home") ?>">Home</a> <span class="mx-2 mb-0">/</span> <a href="<?= base_url("keranjang") ?>">Keranjang</a> <span class="mx-2 mb-0">/</span><strong class="text-black">Pembayaran</strong></div>
        </div>
    </div>
</div>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2">
            <!-- <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    ID: #111-222
                </small>
            </h1> -->

        <!-- <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div> -->
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <!-- <div class="row">
                    <div class="col-12">
                       
                    </div>
                </div> -->
                <!-- .row -->

                <!-- <hr class="row brc-default-l1 mx-n1 mb-4" /> -->

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle">Nama : <?=$nama_lengkap?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                               Alamat :  <?=$alamat?>
                            </div>
                            <div class="my-1">
                              Indonesia
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?=$no_tlp?></b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">NO ORDER:</span> #<?=$no_order?></div>


                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Belum Bayar</span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">Nama Barang</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                        <div class="d-none d-sm-block col-sm-2">Harga Satuan</div>
                        <div class="col-2">Total Harga</div>
                    </div>
                <?php 
                $i = 1;
                foreach ($this->cart->contents() as $key => $items) { ?>
                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1"><?=$i++?></div>
                            <div class="col-9 col-sm-5"><?=$items['name']?></div>
                            <div class="d-none d-sm-block col-2"><?=$items['qty']?></div>
                            <div class="d-none d-sm-block col-2 text-95">Rp. <?=number_format($items['price']) ?></div>
                            <div class="col-2 text-secondary-d2">Rp. <?=number_format($items['subtotal']) ?></div>
                        </div>
                        </div>
              <?php   } ?>
                   

                      

                    <div class="row border-b-2 brc-default-l2"></div>

            

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span class="text-130 text-secondary-d1">Rp. <?=number_format($this->cart->total()) ?></span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Ongkir
                                </div>
                                <div class="col-5">
                                    <span class="text-130 text-secondary-d1">Rp. <?=number_format($ongkir)?></span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Bayar
                                </div>
                                <div class="col-5">
                                    <?php $total_bayar = $ongkir + $this->cart->total()?>
                                    <span class="text-110 text-secondary-d1">Rp. <?=number_format($total_bayar)?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <button type="submt" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" id="pay-button">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="payment-form" method="post" action="<?= site_url() ?>snap/finish">
    <input type="hidden" name="result_type" id="result-type" value="">
    <input type="hidden" name="result_data" id="result-data" value="">
    <!-- <input name="nama" type="hidden" id="nama" value="<?= $nama_lengkap ?>">
    <input name="alamat" type="hidden" id="alamat" value="<?= $alamat ?>">
    <input name="no_tlp" type="hidden" id="no_tlp" value="<?= $no_tlp ?>"> -->
    <input name="total_harga" type="hidden" id="total_harga" value="<?=$total_harga?>">
    <input name="total_bayar" type="hidden" id="total_bayar" value="<?=$total_harga+$ongkir?>">
        <input name="id_user" type="hidden" id="id_user" value="<?=$id_user?>">
    <input name="ongkir" type="hidden" id="ongkir" value="<?=$ongkir?>">
    <input name="no_order" type="hidden" id="no_order" value="<?=$no_order?>">
    <input name="nama_lengkap" type="hidden" id="nama_lengkap" value="<?=$nama_lengkap?>">
    <input name="alamat" type="hidden" id="alamat" value="<?=$alamat?>">
    <input name="layanan" type="hidden" id="layanan" value="<?=$layanan?>">
    <input name="no_telp" type="hidden" id="no_telp" value="<?=$no_tlp?>">

    <!-- <?php echo var_dump($total_harga )?> -->

</form>

<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");
        var total_bayar = $("#total_bayar").val();
        var nama = $("#nama_lengkap").val();
        var alamat = $("#alamat").val();
        var no_telp = $("#no_telp").val();
        var no_order = $("#no_order").val();
        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/snap/token',
            data: {
                total_bayar:total_bayar,
                nama:nama,
                // nama: nama,
                alamat: alamat,
                no_telp: no_telp,
                no_order: no_order,
                // total_harga,
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>