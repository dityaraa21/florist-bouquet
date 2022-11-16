<?php

class model_invoice extends CI_Model
{

    public function dataInvoice(){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_midtrans', 'tb_midtrans.no_order = tb_transaksi.no_order', 'left');
        $this->db->where('tb_midtrans.status_code', 200);
        return $this->db->get()->result();
    }

    public function detailInvoice($no_order){
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_rincian', 'tb_rincian.no_order = tb_transaksi.no_order');
        $this->db->where('tb_transaksi.no_order', $no_order);
        return $this->db->get()->result();

    }

}

?>