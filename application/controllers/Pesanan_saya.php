<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

    public function index()
    {
        $data['pesanan'] = $this->m_pesanan->pesanan();
        $this->load->view('templates_user/header');
        $this->load->view('pesanan_saya', $data);
        $this->load->view('templates_user/footer');
    }
}
