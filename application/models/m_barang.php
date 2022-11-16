<?php

class m_barang extends CI_Model
{

    public function getBarang()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        return $this->db->get()->result();
    }


    public function getBarangKategori(){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori','left'); 
        return $this->db->get()->result();
    }
    public function getBarangDetail($id_brg)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('id_brg', $id_brg);
        return $this->db->get()->row();
    }

    public function tambah_barang($data)
    {
        $this->db->insert('tb_barang', $data);
    }

    public function edit_barang($where)
    {
        return $this->db->get_where('tb_barang', $where);
    }

    public function updateBrg($data){
        $this->db->where('id_brg', $data['id_brg']);
        $this->db->update('tb_barang', $data );
    }


    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function find($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)
                           ->limit(1)
                           ->get('tb_barang');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function getdata( $id_brg){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('id_brg', $id_brg);
        return $this->db->get()->row();
        
    }

    public function getDetailProduk($id_brg){
        $this->db->select('*');
        $this->db->from('tb_barang');   
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori','left'); 
        $this->db->where('tb_barang.id_brg', $id_brg);
        return $this->db->get()->row();
    }

    public function gerBarang($id_brg){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('id_brg', $id_brg);
        return $this->db->get()->result();
    }

    public function getIndex($id_brg){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('id_brg', $id_brg);
        return $this->db->get()->result();
    }



    public function getEdit($id_brg){
        $this->db->select('*');
        $this->db->from('tb_barang');   
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori','left'); 
        $this->db->where('tb_barang.id_brg', $id_brg);
        return $this->db->get()->result();
    }

    public function barangedit($id_brg){
        $this->db->select('*');
        $this->db->from('tb_barang');   
        $this->db->where('id_brg', $id_brg);
        return $this->db->get()->row();

    }

    public function updateBarang($data){
        $this->db->where('id_brg', $data['id_brg']);
        $this->db->update('tb_barang', $data );
    }
}   