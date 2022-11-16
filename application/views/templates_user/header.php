<!DOCTYPE html>
<html lang="en">

<head>
    <title>Florist-Bouquet &mdash;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="#" method="get" class="site-block-top-search">
                                <span class="icon icon-search2"></span>
                                <input type="text" class="form-control border-0" name="cari" placeholder="Search">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="index.html" class="js-logo-clone">Florist Bouquet</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="top-right links">
                                <div class="site-top-icons">
                                    <ul>
                                      <li>
                                        <?php if ($this->session->userdata('role_id') != '2') { ?>
                                          <div class="dropdown">
                                                <a class="dropdown-toggle" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="icon icon-person"></span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?=base_url('auth/login')?>">Masuk</a>
                                                    <a class="dropdown-item" href="<?php echo base_url('registrasi')?>">Daftar</a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php } else { ?>
                                        <li>
                                        <div class="dropdown">
                                                <a class="dropdown-toggle" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="icon icon-person"></span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?=base_url('snap')?>">Bayar</a>
                                                    <a class="dropdown-item" href="<?=base_url('pesanan_saya')?>">Pesanan Saya</a>
                                                    <a class="dropdown-item" href="<?=base_url('home/logout')?>">Logout</a>
                                                </div>
                                            </div>
                                        
                                        </li>
                                        <!-- <li>
                                            <a href="" class="site-cart">
                                                <span class="icon icon-add_shopping_cart"></span>
                                                <span class="count">2</span>
                                            </a>
                                        </li> -->
                                        <li>
                                            <a href="<?=base_url('keranjang')?>" class="site-cart">
                                                <span class="icon icon-shopping_cart"></span>
                                                <?php foreach ($this->cart->contents() as $items){?>
                                                <span class="count"><?=$this->cart->total_items()?></span>
                                                <?php } ?>
                                            </a>
                                        </li>
                                        <?php } ?>
                                </div>

                                <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                        class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                            </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li><a href="<?=base_url("home")?>">Beranda</a></li>
                        <li><a href="<?=base_url('home/vproduk') ?>">Produk</a></li>
                        <li><a href="<?=base_url('home/contact') ?>">Kontak</a></li>
                    </ul>
                </div>
            </nav>
        </header>