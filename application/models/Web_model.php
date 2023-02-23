<?php
class Web_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
protected $table="stakeholder";

//function to whether user exist or not
    public function checkUser($username, $password){
        //select all the records
        $this->db->select();
        //from user table
        $this->db->from($this->table);
        //where condition to compare user name and password 
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
       //limit record count for only one user
        $this->db->limit(1);
        //execute the query
        $qu = $this->db->get();
        //if count==1 return the user
        if($qu->num_rows() == 1){
            return $qu->row();
        }
        //return false if no user exists
        return false;
    }


//function to whether user exist or not
    public function check_login($username, $password){
        //select all the records
        $this->db->select();
        //from user table
        $this->db->from($this->table.' as a');
        //where condition to compare user name and password 
        $this->db->where('a.username', $username);
        $this->db->where('a.password', md5($password));
       //limit record count for only one user
        $this->db->limit(1);
        //execute the query
        $qu = $this->db->get();
        //if count==1 return the user
      //if count==1 return the user
        if($qu->num_rows() == 1){
            return $qu->row();
        }
        //return false if no user exists
        return false;
    }


function get_user_datails()
{
    if($this->session->userdata('type')=="buyer"){
      $this->db->where('id',$this->session->userdata('employee_id'));
      $query = $this->db->get('buyer');
    }else if($this->session->userdata('type')=="supplier"){
        $this->db->where('id',$this->session->userdata('employee_id'));
        $query = $this->db->get('supplier');
    }

    if($query->num_rows()>0){
        return $query->row();
    }else{
        return [];
    }


}

function get_all_not_completed_orders(){
    $this->db->select('*');
    $this->db->from('buying_supplying_order');
    $this->db->join('item','buying_supplying_order.item_id=item.i_id');
    $this->db->where('buyer_id',$this->session->userdata('employee_id'));
    $this->db->where('status <>',6);
   // $this->db->group_by('buyerorder_boi_id');
    $query = $this->db->get();
    if($query->num_rows()>0){
        return $query->result();
    }else{
        return [];
    }
}


 /*   function check_login($un,$pw){
        $this->db->where('username',$un);
        $this->db->where('password',$pw);
        $query = $this->db->get('stakeholder');
        if($query->num_rows()>0){
            $logarr = array(
            'logstts' => 1,
            'logdata' => $query->row()
            );
            return $logarr;
        }else{
            $logarr = array(
            'logstts' => 0,
            'logdata' => []
            );
            return $logarr;
        }
    }  */
   function get_all_not_completed_orders_so(){
    $this->db->select('*');
    $this->db->from('buying_supplying_order');
    $this->db->join('item','buying_supplying_order.item_id=item.i_id');
    $this->db->where('supplier_id',$this->session->userdata('employee_id'));
    $this->db->where('status <>',6);
   // $this->db->group_by('buyerorder_boi_id');
    $query = $this->db->get();
    if($query->num_rows()>0){
        return $query->result();
    }else{
        return [];
    }
}


}
?>