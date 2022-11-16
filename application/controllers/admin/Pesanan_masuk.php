<?php 

class Pesanan_masuk extends CI_Controller{
        public function index(){
            $data = array(
                'psnmsk' => $this->m_pesanan->pesananMasuk(),  
           );
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/pesanan_masuk',$data);
            $this->load->view('templates_admin/footer');
        }

}