<?php

class Web extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Web_model");
		$this->load->model("Supplier_Model");
		$this->load->model("Buyer_Model");

	}

	public function index()
	{
		$this->layouts->view("Home/index");
	}

	public function indexlog()
	{	
		if($this->session->userdata('type')=="buyer"){
			$data['lablename']="buying";	
		$data['pendingorders']=$this->Web_model->get_all_not_completed_orders();
	}else{
			$data['lablename']="supplying";
		$data['pendingorders']=$this->Web_model->get_all_not_completed_orders_so();
	}
		$this->layouts->view("Home/indexlog",$data);
	
	}

	public function loginN()
	{
		$this->layouts->view("Login/index");
	}

/*	function checkauth(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$logstt = $this->Web_model->check_login($username,$password);
		if($logstt['logstts']==1){
			$routs = $logstt['logdata']->type;
			echo "logged ".$routs;
		}else{
			echo "error";
		}
	}*/


public function auth()
	{
		$this->form_validation->set_rules('username',"Username","required");
		$this->form_validation->set_rules('password',"Password","required");

		$isFormValid=$this->form_validation->run();

		if($isFormValid == false){

			$this->form_validation->set_error_delimiters('<div class="error-message">','</div>');
			$this->layouts->view("Login/index");
			return;
		}
		//input fields
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//check user exist or not
		$user=$this->Web_model->check_login($username,$password);


		//parse invalid user
		if(!$user){
			$this->session->set_flashdata('error_message','Invalid User');
			redirect("index.php/web/loginN");
			return;
		}

		$newUser = false;
		if($user->status == null){
			$newUser = true;
		}

		//initialize sessions
		$loggedUserdata = array(
			'id' => $user->id,
			'firstname' => $user->firstname,
			'lastname' => $user->lastname,
			'username' => $user->username,
			'isLoggedIn' => true,
			'type' => $user->type,
			'login_as_customer' => true,
			'employee_id'=> $user->employee_id
			);

		$this->session->set_userdata($loggedUserdata);

		if($newUser){
			redirect('Web/chngpassword');
		}

		redirect('Web/indexlog');
	}



	public function aboutUs()
	{
		$this->layouts->view("Aboutus/index");
	}

	public function contactUs()
	{
		$this->layouts->view("Contactus/index");
	}

	/*public function placebuyingOrder()
	{

		$this->layouts->view("Buyingorder/create",$data);
	}*/

/*	public function placesupplyingOrder()
	{
		$this->layouts->view("Supplyingorder/create");
	}
*/

	public function signup()
	{
		$this->layouts->view("login/signup");
	}

	public function custview()
	{
		$this->layouts->view("Login/view");
	}

	public function chngpassword()
	{

		if($_POST){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|matches[password]');

			$valid = $this->form_validation->run();

			if($valid){

				$data = array(
					'password' => md5($_POST['password']),
					'status' => true
					);
				$logged_user_id = $this->session->userdata('id');

			//	$this->Stakeholder_Model->updatepassword_by_id($logged_user_id, $data);
				
				$this->Buyer_Model->updatepasswordbuyer_by_id($logged_user_id, $data);
				$this->Supplier_Model->updatepasswordsupplier_by_id($logged_user_id, $data);

				redirect('Web');

			}
		}

		$this->layouts->view("change_password/create");
	}



	public function logout(){
		$this->session->sess_destroy();
		redirect("index.php/Web/LoginN");
	}


}
?>