<?php

class Supplier_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "supplier";

    // Get all suppliers
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create suppliers
    function add($data)
    {
        $this->db->insert($this->table, $data);
        //return supplier id
        return $this->db->insert_id();
    }


    public function create_user_account($insert_id,$data)
    {
        $firstname = $data['firstname'];
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
            'type' => 'supplier',
       //     'status' =>'1'
            );

        if($this->db->insert('stakeholder',$login)){
            return $login;
        }else{
            return false;
        }

     //   $this->db->where('id', $insert_id);
        ;
      /*  if ($this->db->update('stakeholder', array(
            'employee_id'=>$insert_id,
            'username' => $username,
            'password' => md5($password),
            'type' => 'supplier',
        ))) {  return $login;
        } else {
            return false;
        }*/
        
    }



    //    // Get customer by id 
    // function get_by_id($id)
    // {
    //     $this->db->where("complaint.id",$id);
    //     $this->db->join("customer", "customer.id = complaint.customer_id");

    //     $q = $this->db->get($this->table);
    //     if($q->num_rows() > 0)
    //     {
    //         return $q->row();
    //     }
    //     return null;
    // } 
            // Get supplier by id 
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

        // Update suppplier
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

       // Update suppplier
    function updatepasswordsupplier_by_id($id, $data)
    {
        try {
            $this->db->where("id",$id);
            $this->db->update('stakeholder',$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        // Delete suppliers
    function delete_by_id($id)
    {
     $this->db->where('id',$id);
        $delstts = $this->db->delete($this->table);
         if($delstts){
            $this->db->where('employee_id',$id); 
            $this->db->delete('stakeholder');

        }
}

     function get_item_by_supplier($supplierId){
      $this->db->select('*');
      $this->db->from('supplieritem as a');
      $this->db->join('item as b','a.item_i_id=b.i_id');
      $this->db->join('supplier', 'a.supplier_id=supplier.id');
      $this->db->where('a.supplier_id',$supplierId);
      $q = $this->db->get();
      if($q->num_rows()>0){
        return $q->result();
      }else{
        return [];
      }
    }
}
?>