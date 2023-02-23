<?php

class Module_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "module";

    // Get all module
    public function GetAll(){
        $q = $this->db->get($this->table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create module
    function add($data)
    {
        $this->db->insert($this->table, $data);
    }

        // Get module by id 
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

        // Update module
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

        // Delete module
    function delete_by_id($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }

    public function get_permission_codes_for_stakeholder_id($stakeholder_id)
    {
        

        $this->db->select("designation_id");
        $this->db->from("employee");
        $this->db->where("id", $stakeholder_id);
        $subQuery = $this->db->get_compiled_select();

        $this->db->select("module.code");
        $this->db->distinct("module.code");
        $this->db->from("designationmodule");
        $this->db->join("module", "designationmodule.module_id = module.id");
        $this->db->where("designationmodule.designation_id IN ($subQuery)");
        $q = $this->db->get();

        $data = $q->result();

        $response = array();

        foreach ($data as $value) {
            array_push($response, $value->code);
        }

        return $response;
    }
}

?>