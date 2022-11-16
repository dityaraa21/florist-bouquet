<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    public function detail($id_kategori){
    $data['barang'] = $this->m_barang->getBarang();
    $data['kategori_detail'] = $this->m_kategori->getKategoriDetail($id_kategori);
    $this->load->view('templates_user/header');
    $this->load->view('kategori', $data);
    $this->load->view('templates_user/footer');
}
}