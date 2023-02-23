<?php
class Login extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
        //load database
    	$this->load->model("Auth_Model");
        $this->load->model("Employee_Model");
    }

    //function to check user loggedin or not
    private function isLoggedIn(){
        if($this->session->userdata('isLoggedIn'))
        {
            redirect("dashboard");
        }
    }

     //function to view login form
    public function index()
    {   
        //to check is user logged
        $this->isLoggedIn();

        $this->load->view("Login/index");
    }

    public function Auth()
    {
     
        $this->isLoggedIn();
        //set validation rules
        $this->form_validation->set_rules('username', "Username", "required");
        $this->form_validation->set_rules('password', "Password", "required");

        //pass the form validation run data to the isFormValid variable 
        $isFormValid = $this->form_validation->run();

        // if isFormValid variable false set error massages for validations
        if ($isFormValid == false) {
            $this->form_validation->set_error_delimiters('<div style="color:#9F000F;font-size:13pt;
                font-weight:bold;font-style:italic;" class="error-message">','</div>');
            $this->load->view("Login/index");
            return;
        }
        //get the username and password to username and password variables
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        /*get the response data to the response variable after executing the 
        check user function in auth model*/
        $response = $this->Auth_Model->checkUser($username, $password);

        //if the response is false show the error message
        if(!$response){
            // parse invalid user
            $this->session->set_flashdata('error_message', 'Invalid Username or Password');
            //load the login view to show the error massage
            $this->load->view("Login/index");
            return;
        }

        $employee=$this->Employee_Model->get_by_id($response->employee_id);
        //else the response true
        // initialize sessions
        $loggedUserdata = array(
            'id' => $response->id,
            'employee_id'=>$response->employee_id,
            'firstname' => $employee->firstname,
            'lastname' => $employee->lastname,
            'username' => $response->username,
            'isLoggedIn' => true,
            'designation_id' => $response->designation_id,
            'location_id' => $response->location_id,
            );
        $this->session->set_userdata($loggedUserdata);
        redirect('Dashboard');
        $this->load->view("Login/index");
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("login");
    }
}