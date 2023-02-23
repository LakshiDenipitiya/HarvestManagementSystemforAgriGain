<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_Controller extends CI_Controller {
	public function __construct() {
	parent::__construct();
	}
	public function custom_view(){
	$this->layout->view('Item/create', array('error' => ' ' ));
	}
	public function do_upload(){
	$config = array(
	'upload_path' => "./uploads/",
	'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
	'overwrite' => TRUE,
	'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
	'max_height' => "768",
	'max_width' => "1024"
	);
	$this->layout->library('upload', $config);
	$this->upload->initialize($config);
	if($this->upload->do_upload())
	{
	$data = array('upload_data' => $this->upload->data());
	$this->layout->view('upload_success',$data);
	}
	else
	{
	$error = array('error' => $this->upload->display_errors());
	$this->layout->view('Item/create', $error);
	}
	}
}
?>