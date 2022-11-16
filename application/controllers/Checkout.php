op<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function index()
    {
        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'no_order' => $this->input->post('no_order'),
            'total_harga' => $this->input->post('total_harga'),
            'layanan'   => $this->input->post('layanan'),
            'ongkir'     => $this->input->post('harga'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'no_tlp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->m_transaksi->checkout($data);


        foreach ($this->cart->contents() as $items) {
            $data_rinci = array(
                // 'id_user' => $this->session->userdata('id_user'),
                'id_brg' => $items['id'],
                'no_order' => $this->input->post('no_order'),
                'nama_barang' => $items['name'],
                'harga'=> $items['price']*$items['qty'],
                'qty' =>  $items['qty'],
            );

            $this->m_transaksi->checkoutrincian($data_rinci);
        }
        // $this->cart->destroy();
        redirect('pesanan_saya');
    }
}
