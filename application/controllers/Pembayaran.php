<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function index(){

        $this->load->view('templates_user/header');
        $this->load->view('pembayaran');
        $this->load->view('templates_user/footer');
    }
}