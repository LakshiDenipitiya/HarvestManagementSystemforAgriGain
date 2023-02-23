<?php

class Supplierstock_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "supplierstock";

    // Get all stock
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create stock
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

        // Get stock by id 
    function get_by_id($id)
    {
        $this->db->where("id",$id);

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 

        // Update stock
    function update_by_id($id, $data)
    {
        try {
            $this->db->where("id",$id);
            $this->db->update($this->table,$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        // Delete stock
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    function get_supplier_by_goodsreceivenotice($grn_id)
    {
        $this->db->select("supplier.id,supplier.code,supplier.companyname");
        $this->db->where("supplierstock.supplier_id",$grn_id);
        //$this->db->where("mechanical.status",'active');
        $this->db->from($this->table);
        $this->db->join("supplier", "supplierstock.supplier_id = supplier.id");
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
        function get_goodsreceivenotice_by_goodsreturnnotice($grtn_id)
    {
        $this->db->select("goodsreceivenotice.id,goodsreceivenotice.goodsreceivenoticeno");
        $this->db->where("supplierstock.goodsreturnnotice_id",$grtn_id);
        //$this->db->where("mechanical.status",'active');
        $this->db->from($this->table);
        $this->db->join("goodsreceivenotice", "supplierstock.goodsreceivenotice_id = goodsreceivenotice.id");
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

}
?>