<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model("Buyer_Model");
		$this->load->model("Supplier_Model");
		$this->load->model("Supplyingorder_Model");
		$this->load->model("Employee_Model");
		$this->load->model("Buyingorder_Model");
		$this->load->model("Manageorder_Model");

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$buyer_List=$this->Buyer_Model->GetAll();
		$supplier_List=$this->Supplier_Model->GetAll();
		$supplyingorder_List=$this->Supplyingorder_Model->GetAll();
		$employee_List=$this->Employee_Model->GetAll();
		$buyingorder_List=$this->Buyingorder_Model->GetAll();
		$consentedorder_List=$this->Manageorder_Model->GetAll();

		$data= array(
			"buyer_count" => count($buyer_List),
			"supplier_count" => count($supplier_List),
			"supplyingorder_count" => count($supplyingorder_List),
			"employee_count" => count($employee_List),
			"buyingorder_count" => count($buyingorder_List),
			"consentedorder_count" => count($consentedorder_List),

			);

		$this->layouts->view('dashboard/dashboard',$data);

	}


}
