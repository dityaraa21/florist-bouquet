<?php

class m_kategori extends CI_Model
{
    public function getKategori(){
        $this->db->select('*');
        $this->db->from('tb_kategori');
        return $this->db->get()->result();
    }

    public function getKategoriDetail($id_kategori){
        $this->db->select('*');
        $this->db->from('tb_barang');   
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori','left'); 
        $this->db->where('tb_barang.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }


}