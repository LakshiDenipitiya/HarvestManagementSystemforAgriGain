<?php
class Stakeholder extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Stakeholder_Model"); //load stakeholder model
        $this->load->model("Employee_Model"); //load employee model
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all Stakeholder data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data = array(
         'stakeholderList'=> $this->Stakeholder_Model->GetAll());

        $this->layouts->view("Stakeholder/index",$data);
    }

    // Load Stakeholder create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $employeeDbList = $this->Employee_Model->GetAll();

        $employeeSelectOptions[""] = "Select an Employee";//to pass a empty value

        foreach ($employeeDbList as $key => $value) {
                $employeeSelectOptions[$value->id] = $value->firstname;//to load values from database
            }
            $data['employeeList'] = $employeeSelectOptions;

            $this->layouts->view("Stakeholder/create",$data);
        }

    // Save Stakeholder form data into DB
        public function save()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();

            $this->form_validation->set_rules('employee_id', 'Name of the Employee','required');
            $this->form_validation->set_rules('username', 'Username','required');
            $this->form_validation->set_rules('password', 'Password','required');
            
            if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
                $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                    ,'</div>');
                
                $employeeDbList = $this->Employee_Model->GetAll();

        $employeeSelectOptions[""] = "Select an Employee";//to pass a empty value

        foreach ($employeeDbList as $key => $value) {
                $employeeSelectOptions[$value->id] = $value->firstname;//to load values from database
            }
            $data['employeeList'] = $employeeSelectOptions;

            // Load view
            $this->layouts->view("Stakeholder/create",$data);
            return;
        }else{
            
            // Is form Valid        
            $data = array(
                'employee_id' => $this->input->post('employee_id'),
                'username' => $this->input->post('username'),
                'password' => md5( $this->input->post('password')),

                );

        // Save Data
            $this->Stakeholder_Model->add($data);
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Stakeholder added successfully!</h4></div>');
        //redirect to Stakeholder page
            redirect("Stakeholder",'refresh');
        }
    }

        // clear Stakeholder form
    public function clear()
    {
       //redirect to Stakeholder page
        redirect("Stakeholder",'refresh');
    }
    

    public function edit()
    {
            //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Stakeholder_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $employeeDbList = $this->Employee_Model->GetAll();

        $employeeSelectOptions[""] = "Select an Employee";//to pass a empty value

        foreach ($employeeDbList as $key => $value) {
                $employeeSelectOptions[$value->id] = $value->firstname;//to load values from database
            }
            $data['employeeList'] = $employeeSelectOptions;

            $this->layouts->view("Stakeholder/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('employee_id', 'Name of the Employee','required');
        $this->form_validation->set_rules('username', 'Username','required');
        $this->form_validation->set_rules('password', 'Password','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Stakeholder_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;
            
            $this->layouts->view("Stakeholder/edit", $data);
            return;
        }else{

            $userData = array(
                'employee_id' => $this->input->post('employee_id'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                );


            $this->Stakeholder_Model->update_by_id($userId, $userData);}


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Stakeholder Updated successfully!</h4></div>');

        //redirect to Stakeholder page
            redirect('Stakeholder','refresh');
        }

        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            $userId = $this->uri->segment(3);
            $this->Stakeholder_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Stakeholder deleted successfully!</h4></div>');

        //redirect to Stakeholder page
            redirect('Stakeholder','refresh');
        }
    }
    ?>
