<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailproduk extends CI_Controller {

    public function bunga($id_brg){
        $data['detailproduk'] = $this->m_barang->getDetailProduk($id_brg);
        $this->load->view('templates_user/header');
        $this->load->view('detailproduk', $data);
        $this->load->view('templates_user/footer');
    } 
}