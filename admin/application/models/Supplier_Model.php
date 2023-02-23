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

    // Get all active buyers
    public function GetAllactivesuppliers(){
        $this->db->where('status',1);
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

     
        
    }



   
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

              // Update supplier
    function update_status($id, $status)
    {
        $data['status'] = $status;
        
        $this->db->where("id",$id);
        return $this->db->update($this->table,$data);

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

// Get all active buyers
    public function GetAllactivesuppliersby(){
        $this->db->where('status',1);
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

     public function GetAllactivesuppliersbycity(){
        $this->db->where('status',1);
        $this->db->where('city','Anuradhapura');
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

      public function GetAllactivesuppliersbymonaragala(){
        $this->db->where('status',1);
        $this->db->where('city','Monaragala');
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

    public function GetAllactivesuppliersbycolombo(){
        $this->db->where('status',1);
        $this->db->where('city','Colombo');
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
}
?>