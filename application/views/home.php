<div class="site-blocks-cover" style="background-image: url('assets/images/banner2.png');" data-aos="fade">
    <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                <h1 class="mb-2">Custom Buket Bunga Yang Indah Untuk Yang Terindah</h1>
                <div class="intro-text text-center text-md-left">
                    <p class="mb-4">Custom Buket Bunga dengan kualitas hand made dan Harga yang terjangkau </p>
                    <p>
                        <a href="" class="btn btn-sm btn-primary">Belanja Sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm site-blocks-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Pengiriman</h2>
                    <p>Pengiriman bisa ke seluruh wilayah Indonesia</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-star"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Kualitas Terbaik</h2>
                    <p>Kualitas barangnya terjamin dikemas dengan cintah</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-security"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">Keamanan</h2>
                    <p>Kami menjamin keamanan dalam pengiriman barang sampai diterima oleh anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section block-3 site-blocks-2 bg-light" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Produk Terlaris</h2>
            </div>
        </div>

        <!--         
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    <?php foreach ($barang as $key => $value) { ?>
                    <div class="item">
                        <div class="block-4 text-center">
                            <a href="">
                                <figure class="block-4-image">
                                    <img src="#" alt="..." class="img-fluid" width="100%" style="height:300px">
                                </figure>
                            </a>
                            <div class="block-4-text p-4">
                                <h3><a href=""></a></h3>
                                <p class="mb-0"></p>
                                <a href="" class="btn btn-primary mt-2">Detail</a>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</div> -->


        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    <?php foreach ($barang as $key => $value) { ?>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="<?= base_url('uploads/' . $value->gambar) ?>" alt="Image placeholder" class="img-fluid" width="100%" style="height:300px">
                                </figure>
                                </a>
                                <div class="block-4-text p-4">
                                    <h3><?= $value->nama_brg ?></a></h3>
                                    <p class="mb-0">Rp. <?= number_format($value->harga, 0) ?></p>
                                    <a href="<?= base_url('detailproduk/bunga/' . $value->id_brg) ?>" class="btn btn-primary mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</div>