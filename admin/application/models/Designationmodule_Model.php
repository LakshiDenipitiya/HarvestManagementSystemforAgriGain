<?php

class Designationmodule_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "designationmodule";

    // Get all designation module
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create designation module
    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

        // Get designation module by id 
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

        // Update designation module
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

        // Delete designation module
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    // Delete module by designation id
    function delete_by_designation_id($desig_id)
    {
        $this->db->where("designation_id",$desig_id);
        $this->db->delete($this->table);
    }
    //det module details by designation id
    function get_module_by_designation($desig_id)
    {
        $this->db->select("module.code,module.name,module.id");
        $this->db->where("designationmodule.designation_id",$desig_id);
        //$this->db->where("designation.status",'active');
        $this->db->from($this->table);
        $this->db->join("module", "designationmodule.module_id = module.id");
        $q = $this->db->get();

        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
}
?>