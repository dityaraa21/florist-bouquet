<?php

class m_pesanan extends CI_Model
{
    public function pesanan(){
        $this->db->select('*');
        $this->db->from('tb_midtrans');
        $this->db->where('id_user', $this->session->userdata('id_user'));      
        return $this->db->get()->result();
    }

    public function pesananMasuk(){
        $this->db->select('*');
        $this->db->from('tb_midtrans');
        return $this->db->get()->result();
    }
}
   