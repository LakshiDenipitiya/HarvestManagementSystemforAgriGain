<?php

class Supplyingorder_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "supplyingorder";

    // Get all supply
    public function GetAll(){
    /*    $this->db->select('buyingorder.bo_id,buyingorder.b_app_date, employee.firstname, employee.lastname, buyingorder.status, location_id, location.location, buyer_id');*/

        $this->db->select('*');
        
       // $this->db->where('employee.leavestatus = "Work"') and ('employeedesignation_id = 5') and ('employee.dateofresigned = NULL');
        $this->db->join('location','location_id = location.id');
        $this->db->join('supplier','supplier_id = supplier.id');

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

/*    function getBuyingorderByStatus($status_type){

        $this->db->select('buyingorder.id,buyingorder.app_date, employee.firstname, employee.lastname, buyingorder.status, location_id, location.location, buyer_id');
        $this->db->join('employee', 'employee_id = employee.id');
        $this->db->join('location','location_id = location.id');
        $this->db->join('buyer','buyer_id = buyer.id');

        $this->db->where('buyingorder.status', $status_type);
        $q=$this->db->get($this->table);
        
        if($q->num_rows()>0)
        {
            return $q->result();
        }
        return array();

    }*/

        // Create buyingorder
 /*   function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }*/

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

        // Update buyingorder
 /*   function update_by_id($id, $data)
    {
        try {
            $this->db->where("id",$id);
            $this->db->update($this->table,$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }*/
            // Update buyingorder
/*    function update_status($buyingorder_id, $status)
    {
        $data['jb_complete'] = $status;
        
        $this->db->where("id",$buyingorder_id);
        return $this->db->update($this->table,$data);

    }*/

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

 /*   function get_buyingorder_by_buyer($buyer_id)
    {
        $this->db->select("buyingorder.id,buyingorder.createddate");

        $this->db->where('buyingorder.buyer_id', $buyer_id);
        
        $this->db->from($this->table);
        
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
*/

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
        $this->db->select('*,supplyingorder.status as so_stts,buying_supplying_order.status as boso_stts');
        $this->db->from('supplyingorder');
        $this->db->join('supplier','supplyingorder.supplier_id=supplier.id');
        $this->db->join('buying_supplying_order','supplyingorder.so_id=buying_supplying_order.supplierorder_soi_id','left');
        $this->db->join('location','supplyingorder.location_id=location.id');
        $this->db->join('item as b','buying_supplying_order.item_id=b.i_id','left');
        $this->db->where('supplyingorder.supplier_id',$this->session->userdata('employee_id'));
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

}
?>