<?php

class Buyeritem_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "buyeritem";

    // Get all supplier item
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create supplier item
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

        // Get supplier item by id 
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

        // Update supplier item
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

        // Delete supplier item
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    // Delete supplier items by supplier id
    function delete_by_buyer_id($buy_id)
    {
        $this->db->where("buyer_id",$buy_id);
        $this->db->delete($this->table);
    }

    function get_items_by_buyer($buy_id)
    {
        $this->db->select("item.item, item.i_id");
        $this->db->where("buyeritem.buyer_id",$buy_id);
        //$this->db->where("designation.status",'active');
        $this->db->from($this->table);
        $this->db->join("item", "buyeritem.item_i_id = item.i_id");
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

    
}
?>