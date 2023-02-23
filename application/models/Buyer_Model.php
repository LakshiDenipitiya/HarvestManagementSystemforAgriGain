<?php

class Buyer_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "buyer";

    // Get all buyers
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create buyers
    function add($buy_data)
    {
        $this->db->insert($this->table, $buy_data);
        //return buyer id
        return $this->db->insert_id();
    }


    public function create_user_account($insert_id,$buy_data)
    {
        $firstname = $buy_data['firstname'];
        $firstname = strtolower($firstname);
        $username = $firstname.$insert_id;

        //get username as a text into sha value
        $pw = sha1($username);
        //substring sha value to 7 characters
        $password = substr($pw, 0, 7);

        $login = array(
            'employee_id'=>$insert_id,
            'username' => $username,
            'password' => md5($password),
            'type' =>'buyer'
     //       'status' =>'1'
            );

        if($this->db->insert('stakeholder',$login)){
            return $login;
        }else{
            return false;
        }

        // $this->db->where('id', $insert_id);
        ;
        /*if ($this->db->update('stakeholder', array(
            'employee_id'=>$insert_id,
            'username' => $username,
            'password' => md5($password),
            'type' => 'buyer',
        ))) {  return $login;
        } else {
            return false;
        } */
       
    }
        
    

    //    // Get buyer by id 
    // function get_by_id($id)
    // {
    //     $this->db->where("complaint.id",$id);
    //     $this->db->join("buyer", "buyer.id = complaint.buyer_id");

    //     $q = $this->db->get($this->table);
    //     if($q->num_rows() > 0)
    //     {
    //         return $q->row();
    //     }
    //     return null;
    // } 
            // Get buyer by id 
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

        // Update buyers
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


         // Update buyers
    function updatepasswordbuyer_by_id($id, $data)
    {
        try {
            $this->db->where("id",$id);
            $this->db->update('stakeholder',$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        // Delete buyer
    function delete_by_id($id)
    {
        $this->db->where('id',$id);
        $delstts = $this->db->delete($this->table);
         if($delstts){
            $this->db->where('employee_id',$id); 
            $this->db->delete('stakeholder');
         }
           
        

    }

     function get_item_by_buyer($buyerId){
      $this->db->select('*');
      $this->db->from('buyeritem as a');
      $this->db->join('item as b','a.item_i_id=b.i_id');
      $this->db->join('buyer', 'a.buyer_id=buyer.id');
      $this->db->where('a.buyer_id',$buyerId);
      $q = $this->db->get();
      if($q->num_rows()>0){
        return $q->result();
      }else{
        return [];
      }
    }
}
?>