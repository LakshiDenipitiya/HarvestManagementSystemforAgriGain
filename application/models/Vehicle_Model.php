<?php

class Vehicle_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "vehicle";

    // Get all vehicle
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create vehicle
    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

        // Get vehicle by id 
    function get_by_id($id)
    {
         $this->db->where("vehicle.v_id",$id);
        $this->db->join("location", "location.id = vehicle.location_id");

        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 

        // Update vehicle
    function update_by_id($id, $data)
    {
        try {
            $this->db->where("v_id",$id);
            $this->db->update($this->table,$data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        // Delete vehicle
    function delete_by_id($id)
    {
        $this->db->where("v_id",$id);
        $this->db->delete($this->table);
    }

    function GetAllwithDetails(){
        /*$q=$this->db->get($this->table);*/

        $sql = "select* ,vehicle.v_id as vehicle_id from Vehicle INNER JOIN location ON vehicle.location_id = location.id";
        $query = $this->db->query($sql);
        return $query->result();


    }

          // Update vehicle
    function update_status($id,$status)
    {
        $data['v_status'] = $status;
        
        $this->db->where("v_id",$id);
        return $this->db->update($this->table,$data);

    }




}
?>