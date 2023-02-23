<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions {

	private $CI;
	private $permission_codes=array();

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('Module_Model');
		$this->permission_codes = $this->CI->Module_Model->get_permission_codes_for_stakeholder_id($this->CI->session->employee_id);
	}

	public function has_permission($code, $permission_array = array())
	{
		$isExist = in_array($code, $this->permission_codes);
        if ($isExist) {
             return true; 
        }
         return false; 
	}

	public function get_permission_codes(){
		return $this->permission_codes;
	}
}