<?php

class Item_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "item";

    // Get all item
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create item
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

        // Get item by id 
    function get_by_id($id)
    {
         $this->db->where("item.i_id",$id);
        $this->db->join("category", "category.id = item.category_id");

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 

        // Update item
    function update_by_id($id, $data)
    {
        try {
            $this->db->where("i_id",$id);
            $this->db->update($this->table,$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        // Delete item
    function delete_by_id($id)
    {
        $this->db->where("i_id",$id);
        $this->db->delete($this->table);
    }

    function GetAllwithDetails(){
        /*$q=$this->db->get($this->table);*/

        $sql = "select* ,item.i_id as item_id from Item INNER JOIN category ON item.category_id = category.id";
        $query = $this->db->query($sql);
        return $query->result();


    }

          // Update item
    function update_status ($item_id, $status)
    {
        $data['i_status'] = $status;
        
        $this->db->where("i_id",$item_id);
        return $this->db->update($this->table,$data);

    }

    function getAllbybuyer($buyerid){
        $this->db->where('buyeritem.buyer_id',$buyerid);
        $this->db->join('item','buyeritem.item_i_id=item.i_id');
         $q = $this->db->get('buyeritem');
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

    function getAllbysupplier($supplierid){
        $this->db->where('supplieritem.supplier_id',$supplierid);
         $this->db->join('item','supplieritem.item_i_id=item.i_id');
         $q = $this->db->get('supplieritem');
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }


}
?>