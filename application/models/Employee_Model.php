<?php

class Employee_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    protected $table = "employee";

    // Get all employee
    public function GetAll(){
        $this->db->select('a.*,b.*,c.*,a.id as empid');
        $this->db->join('location as b','a.location_id=b.id');
        $this->db->join('designation as c','a.designation_id=c.id');
        $q = $this->db->get($this->table.' as a');
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }

        // Create employee
    function add($data)
    {
        $data['dateofresigned'] = NULL;
        
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


        // Get employee by id 
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

    function get_by_id_loc_des($id) 
    {
         $this->db->select('a.*,b.*,c.*');
        $this->db->from($this->table.' as a');
        $this->db->join('location as b','a.location_id=b.id');
        $this->db->join('designation as c','a.designation_id=c.id');
        $this->db->where("a.id",$id);
         
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } 
    
 /*   function get_by_id_designation($id) 
    {
        $this->db->select('*');
        $this->db->from($this->table.' as a');
        $this->db->join('designation as c','a.designation_id=c.id');
        $this->db->where("a.id",$id);
         
        $q = $this->db->get();
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return null;
    } */



        // Update employee
    function update_by_id($id, $data)
    {
        if ($data['dateofresigned'] == '') {
            $data['dateofresigned'] = NULL;
        }
        $this->db->where("id",$id);
        $this->db->update($this->table,$data);

    }

           // Update employee
    function update_leave($employee_id, $status)
    {
        $data['leavestatus'] = $status;
        
        $this->db->where("id",$employee_id);
        return $this->db->update($this->table,$data);

    }

        // Delete employee
    function delete_by_id($id)
    {
        $this->db->where('id',$id);
        $delstts = $this->db->delete($this->table);
         if($delstts){
            $this->db->where('employee_id',$id); 
            $this->db->delete('stakeholder');
         }
           
        

    }

    //    function get_employee_details_by_jobrequest($jobreq_id)
    // {
    //     $this->db->select("employee.firstname,employee.designation,employee.status ,employee.id");//get feilds form employee table
    //     $this->db->where("jobrequest.id",$jobreq_id); //pass jobrequest.id to jobreq_id variable
    //     $this->db->where("employee.status",'0' AND "employee.designation",'labour'); //condition checking
    //     $this->db->from($this->table);
    //    $this->db->join("employee", "employee.id = jobrequest.id");
    //     $q = $this->db->get();

    //     if($q->num_rows() > 0)
    //     {
    //         return $q->result();
    //     }
    //     return array();
    // }
}
?>