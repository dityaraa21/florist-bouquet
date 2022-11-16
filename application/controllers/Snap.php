<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-4L7qhXAVMFI_2OnlXalwuo0O', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function index()
    {
		
		$data = array(
            'psn' => $this->m_transaksi->tampilPesanan(),  
			'total_harga' => $this->cart->total(),
			'harga' => $this->input->post('harga'),
			'id_user' => $this->session->userdata('id_user'),
            'no_order' => $this->input->post('no_order'),
            'total_harga' => $this->input->post('total_harga'),
            'layanan'   => $this->input->post('layanan'),
            'ongkir'     => $this->input->post('harga'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'no_tlp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),

       );
    	$this->load->view('templates_user/header');
        $this->load->view('pembayaran',$data);
        $this->load->view('templates_user/footer');
    }

    public function token()
    {
		// $nama = $this->input->post('nama');
		// $alamat = $this->input->post('alamat');
		// $no_tlp = $this->input->post('no_tlp');
		// $total = $this->input->post('total');
		// Required

		$total = $this->input->post('total_bayar');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$no_order = $this->input->post('no_order');
		$transaction_details = array(
		  'order_id' => $no_order,
		  'gross_amount' => $total, // no decimal allowed for creditcard
		);

		// Optional
		// $item1_details = array(
		//   'id' => 'a1',
		//   'price' => '18000',
		//   'quantity' => 3,
		//   'name' => "Apple"
		// );

		// // Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// // Optional
		// $item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(

		  'address'       => $alamat,
		  
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $nama,
		  'phone'         => $no_telp,
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'day', 
            'duration'  => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            // 'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'), true);

		$data = array(
            'id_user' => $this->session->userdata('id_user'),
            'no_order' => $this->input->post('no_order'),
            'total_harga' => $this->input->post('total_harga'),
            'total_bayar' => $this->input->post('total_bayar'),
            'layanan'   => $this->input->post('layanan'),
            'ongkir'     => $this->input->post('ongkir'),
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

    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

		// redirect('/');

		$datatrans = [
			'no_order' => $result['order_id'],
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			// 'bank' => $result['va_numbers'][0]["bank"],
			// 'va_number' => $result['va_numbers'][0]["va_number"],
			'id_user' => $this->session->userdata('id_user'),
			'pdf_url'=> $result['pdf_url'],
			'status_code' => $result['status_code']
		];

		$simpan = $this->db->insert('tb_midtrans', $datatrans);
		if($simpan) {
			echo "sukses";
		} else {
			echo "gagal";
		}
		$this->cart->destroy();
		redirect('pesanan_saya');
    }
}
