<?php

class Buyingorder_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "buyingorder";

    // Get all supply
    public function GetAll(){
    /*    $this->db->select('buyingorder.bo_id,buyingorder.b_app_date, employee.firstname, employee.lastname, buyingorder.status, location_id, location.location, buyer_id');*/

        $this->db->select('*');
        
       // $this->db->where('employee.leavestatus = "Work"') and ('employeedesignation_id = 5') and ('employee.dateofresigned = NULL');
        $this->db->join('location','location_id = location.id');
        $this->db->join('buyer','buyer_id = buyer.id');

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
        $this->db->where("bo_id",$id);
        $this->db->join('buyer as b',$this->table.'.buyer_id = b.id');
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
        $this->db->where("bo_id",$id);
        
        $deletestatus=$this->db->delete($this->table);
        if($deletestatus){
             $this->db->where("buyingorder_bo_id",$id);
             $this->db->delete('buyingorderitem');
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

    function get_buyer_items($bid){
        $this->db->where('buyeritem.buyer_id',$bid);
        $this->db->join('item','buyeritem.item_i_id=item.i_id');
        $q = $this->db->get('buyeritem');
        if($q->num_rows()>0){
            return $q->result();
        }else{
            return [];
        }
    }

    function add_new_order($bordarr){
         $this->db->insert('buyingorder',$bordarr);
         return $this->db->insert_id();
    }

    function add_bo_items($boitems){
        return $this->db->insert('buyingorderitem',$boitems);
    }

    function getAllBuyingOrders(){
        $this->db->select('*,buyingorder.status as bo_stts,buying_supplying_order.status as boso_stts');
        $this->db->from('buyingorder');
        $this->db->join('buyer','buyingorder.buyer_id=buyer.id');
        $this->db->join('buying_supplying_order','buyingorder.bo_id=buying_supplying_order.buyerorder_boi_id','left');
        $this->db->join('location','buyingorder.location_id=location.id');
        $this->db->join('item as b','buying_supplying_order.item_id=b.i_id','left');
        $this->db->where('buyingorder.buyer_id',$this->session->userdata('employee_id'));
     //   $this->db->group_by('buyingorder.bo_id');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_item_by_buyingorder($buyingorderId){
      $this->db->select('*');
      $this->db->from('buyingorderitem as a');
      $this->db->join('item as b','a.item_i_id=b.i_id');
      $this->db->where('a.buyingorder_bo_id',$buyingorderId);
      $q = $this->db->get();
      if($q->num_rows()>0){
        return $q->result();
      }else{
        return [];
      }
    }

    function get_buying_order($id){
        $this->db->where('bo_id',$id);
        return $this->db->get('buyingorder')->row();
    }

    function update_buying_order($bordarr,$boid){
        $this->db->where('bo_id',$boid);
        return $this->db->update('buyingorder',$bordarr);
    }

    function delete_buyingorder_item($boid){
         $this->db->where('buyingorder_bo_id',$boid);
         return $this->db->delete('buyingorderitem');
    }

}
?>