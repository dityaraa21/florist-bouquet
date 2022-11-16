<?php

class m_transaksi extends CI_Model
{

    public function checkout($data){
        $this->db->insert('tb_transaksi', $data);
    }
    public function checkoutrincian($data){
        $this->db->insert('tb_rincian', $data);
    }

    public function tampildata($nama){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('nama_lengkap', $nama);
        return $this->db->get()->row();
    }

    public function tampilPesanan(){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user');
        $this->db->where('tb_user.id_user',$this->session->userdata('id_user'));
        return $this->db->get()->result();
    }
}