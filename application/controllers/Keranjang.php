<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $this->load->view('templates_user/header');
        $this->load->view('keranjang');
        $this->load->view('templates_user/footer');
    }

    public function add()
    {
        $data = array(
            'id'      => $this->input->post('id_brg'),
            'qty'     => 1,
            'price'   => $this->input->post('harga'),
            'name'    => $this->input->post('nama_barang'),
        );

        $this->cart->insert($data);
        redirect('keranjang');
    }

    public function destroy()
    {
        $this->cart->destroy();
        redirect('keranjang');
    }
}
