<?php
class Charts extends CI_Controller{

	function __construct()
	{
		parent::__construct();
       
	}

	//load create page 
	public function create()
	{
		$this->layouts->view("Charts/monthly_sales_and_services");
	}
}