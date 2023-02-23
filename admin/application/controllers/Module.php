<?php
class Module extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Module_Model"); //laod module model
        $this->isLoggedIn();

          $loggedUser = $this->session->userdata("id");
      $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all module data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();
         //check has permissions
       if (!$this->permissions->has_permission('module_list', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $data = array(
         'moduleList'=> $this->Module_Model->GetAll());

        $this->layouts->view("Module/index",$data);
    }

    // Load module create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();
         //check has permissions
       if (!$this->permissions->has_permission('module_create', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $this->layouts->view("Module/create");
    }

    // Save module form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('code', 'Code','required');
        $this->form_validation->set_rules('name', 'Name','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            
            // Load view
            $this->layouts->view("Module/create");
            return;
        }else{
            
            // Is form Valid        
            $data = array(
               'code' => $this->input->post('code'),
               'name' => $this->input->post('name'),
               );

        // Save Data
            $this->Module_Model->add($data);
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Module added successfully!</h4></div>');
        //redirect to module page
            redirect("Module",'refresh');
        }
    }
    
        // clear module form
    public function clear()
    {
       //redirect to module page
        redirect("Module",'refresh');
    }
    

    public function edit()
    {
            //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Module_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $this->layouts->view("Module/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('code', 'Code','required');
        $this->form_validation->set_rules('name', 'Name','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Module_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;
            
            $this->layouts->view("Module/edit", $data);
            return;
        }else{

            $userData = array(
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),

                );


            $this->Module_Model->update_by_id($userId, $userData);}


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Module Updated successfully!</h4></div>');

        //redirect to module page
            redirect('Module','refresh');
        }

        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            $userId = $this->uri->segment(3);
            $this->Module_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Module deleted successfully!</h4></div>');

        //redirect to module page
            redirect('Module','refresh');
        }
    }
    ?>
