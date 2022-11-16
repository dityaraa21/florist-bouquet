<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$auth = $this->m_auth->cek_login();
		$data['barang'] = $this->m_barang->getBarang();
		if ($auth == FALSE) {
			$this->load->view('templates_user/header');
			$this->load->view('home', $data);
			$this->load->view('templates_user/footer');
		} else {
			$this->session->set_userdata('username', $auth->username);
			$this->session->set_userdata('role_id', $auth->role_id);
			switch ($auth->role_id) {
				case 1:
					redirect('admin/c_dashboard');
					break;
				case 2:
					redirect('home');
					break;
				default:
					break;
			}
		}
	}

	public function vproduk()
	{
		$data['barang'] = $this->m_barang->getBarang();
		$data['kategori'] = $this->m_kategori->getKategori();
		$this->load->view('templates_user/header');
		$this->load->view('produk', $data);
		$this->load->view('templates_user/footer');
	}

	public function contact()
	{
		$this->load->view('templates_user/header');
		$this->load->view('contact');
		$this->load->view('templates_user/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}
}
