<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layouts {

	private $CI;
	private $title_for_layout;
	private $title_seperator = ' | ';
	private $permission_list;
	private $includes = array();

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	// Set Title to the page
	public function set_title($title)
	{
		$this->title_for_layout = $title;
	}

	// Set permission list to the page
	public function set_permission_list($permission_list)
	{
		$this->permission_list = $permission_list;
	}

	// Add includes in the page
	public function add_include($path, $prepend_base_url = true)
	{
		if ($prepend_base_url) {
			$this->CI->load->helper('url');
			$this->includes[] = base_url().$path;
		}else{
			$this->includes[] = $path;
		}
		return $this;
	}

	// print includes to the page
	public function print_include($type)
	{
		$css_includes = '';
		$js_includes = '';

		foreach ($this->includes as $include) {
			if (preg_match('/js$/', $include)) {
				$js_includes.= '<script type="text/javascript" href="'.$include.'"></script>';
			}else if(preg_match('/css$/', $include)){
				$css_includes.= '<link rel="stylesheet" type="text/css" href="'.$include.'">';
			}
		}
		if ($type == 'css') {
			return $css_includes;
		}else{
			return $js_includes;
		}
	}

	// Set view to the page
	public function view($view_name, $params = array(), $layout = "_layout")
	{
		$sub_view = $this->CI->load->view($view_name, $params, true);
		if ($this->title_for_layout != null) {
			$this->title_for_layout = $this->title_seperator . $this->title_for_layout;
		}

		$this->CI->load->view('_layout/' . $layout, array(
			'subview' => $sub_view,
			'title_for_layout' => $this->title_for_layout,
			'permission_list' => $this->permission_list
			));
	}
}