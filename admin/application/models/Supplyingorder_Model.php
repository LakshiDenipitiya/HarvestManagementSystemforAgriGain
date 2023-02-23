<?php

class Supplyingorder_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "supplyingorder";

    // Get all supply
    public function GetAll(){
    

        $this->db->select('*');
        
       
        $this->db->join('location','location_id = location.id');
        $this->db->join('supplier','supplier_id = supplier.id');

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }


        // Get buying order by id 
    function get_by_id($id)
    {
        $this->db->where("so_id",$id);
        $this->db->join('supplier as s',$this->table.'.supplier_id = s.id');
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 

       

        // Delete buyingorder
    function delete_by_id($id)
    {
        $this->db->where("so_id",$id);
        
        $deletestatus=$this->db->delete($this->table);
        if($deletestatus){
             $this->db->where("supplyingorder_so_id",$id);
             $this->db->delete('supplyingorderitem');
        }

    }

 

    function get_supplier_items($sid){
        $this->db->where('supplieritem.supplier_id',$sid);
        $this->db->join('item','supplieritem.item_i_id=item.i_id');
        $q = $this->db->get('supplieritem');
        if($q->num_rows()>0){
            return $q->result();
        }else{
            return [];
        }
    }

    function add_new_order($sordarr){
         $this->db->insert('supplyingorder',$sordarr);
         return $this->db->insert_id();
    }

    function add_so_items($soitems){
        return $this->db->insert('supplyingorderitem',$soitems);
    }

    function getAllSupplyingOrders(){
        $this->db->select('*,supplyingorder.status as so_stts,buying_supplying_order.status as boso_stts,supplier.id as supid');
        $this->db->from('supplyingorder');
        $this->db->join('supplier','supplyingorder.supplier_id=supplier.id','left');
         $this->db->join('buying_supplying_order','supplyingorder.so_id=buying_supplying_order.supplierorder_soi_id','left');
        $this->db->join('location','supplyingorder.location_id=location.id','left');
      //  $this->db->join('item as b','buying_supplying_order.item_id=b.i_id','left');
           if($this->session->userdata('designation_id')=="2"){
                $this->db->where('supplyingorder.location_id',$this->session->userdata('location_id'));
            }
        $this->db->group_by('supplyingorder.so_id');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_item_by_supplyingorder($supplyingorderId){
      $this->db->select('*');
      $this->db->from('supplyingorderitem as a');
      $this->db->join('item as b','a.item_i_id=b.i_id');
      $this->db->where('a.supplyingorder_so_id',$supplyingorderId);
      $q = $this->db->get();
      if($q->num_rows()>0){
        return $q->result();
      }else{
        return [];
      }
    }

     function get_supplying_order($id){
        $this->db->where('so_id',$id);
        return $this->db->get('supplyingorder')->row();
    }

    function update_supplying_order($sordarr,$soid){
        $this->db->where('so_id',$soid);
        return $this->db->update('supplyingorder',$sordarr);
    }

    function delete_supplyingorder_item($soid){
         $this->db->where('supplyingorder_so_id',$soid);
         return $this->db->delete('supplyingorderitem');
    }

       // Update employee
    function update_status($id, $status)
    {
        $data['actstatus'] = $status;
        
        $this->db->where("so_id",$id);
        return $this->db->update($this->table,$data);

    }

}
?>