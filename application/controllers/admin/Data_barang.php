<?php 

class Data_barang extends CI_Controller{
    // public function __construct()
    // {
    //     parent::__construct();

    //     if($this->session->userdata('role_id') != '1'){
    //         $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //         Anda Belum Login!
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //       redirect('auth/login');
    //     }
    // }
    
    public function index()
    {
        $data = array(
            'barang' => $this->m_barang->getBarangKategori(),
            'kategori' => $this->m_kategori->getKategori(),

        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_brg       = $this->input->post('nama_brg');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $berat          = $this->input->post('berat');
        $gambar         = $_FILES['gambar']['name'];
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($gambar =''){          
        }else{
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal di Upload!";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }

        $data = array (
            'nama_brg'     => $nama_brg,
            'keterangan'   => $keterangan,
            'id_kategori'     => $kategori,
            'harga'        => $harga,
            'stok'         => $stok,
            'berat'        => $berat,
            'gambar'       => $gambar
        );

        $this->m_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
        }

    public function edit($id_brg)
    {
      
     
        
        $data = array(
            'barang' => $this->m_barang->getEdit($id_brg),
            'kategori' => $this->m_kategori->getKategori(),
        );

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update($id_brg)
    {
        $nama_brg       = $this->input->post('nama_brg');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $berat          = $this->input->post('berat');
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        if (!$this->upload->do_upload("gambar")) {
            $data = array(
                'error_upload' => $this->upload->display_errors(),
            );
            echo "error";
        } else  {
            $barang = $this->m_barang->barangedit($id_brg);
            if (
                $barang->gambar != ""
            ) {
                unlink('./uploads/' . $barang->gambar);
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_brg' => $id_brg,
                'nama_brg'     => $nama_brg,
                'keterangan'   => $keterangan,
                'id_kategori'     => $kategori,
                'harga'        => $harga,
                'stok'         => $stok,
                'berat'        => $berat,
                'gambar' => $upload_data['uploads']['file_name'],
            );
            $this->m_barang->updateBarang($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!');
            redirect('admin/data_barang');
        }

        
    }

    public function detail($id_brg)
    {
        $data = array(
            'barang' => $this->m_barang->getEdit($id_brg),
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function hapus ($id)
    {
        $where = array('id_brg' => $id);
        $this->m_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}