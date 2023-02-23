<?php
class Category extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Category_Model"); //laod category model
        $this->isLoggedIn();

        $loggedUser = $this->session->userdata("id");
      $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);

    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }

    
    // Load all category data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

         //check has permissions
       if (!$this->permissions->has_permission('category_list', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $data = array(
         'categoryList'=> $this->Category_Model->GetAll()); //load category all category data

        $this->layouts->view("Category/index",$data);
    }

    // Load category create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

         //check has permissions
       if (!$this->permissions->has_permission('category_create', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $this->layouts->view("Category/create");
    }

    // Save customer form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('code', 'Code','required');
        $this->form_validation->set_rules('category', 'Category','required');
        $this->form_validation->set_rules('unit', 'Unit','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
          $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
            ,'</div>');
          
            // Load view
          $this->layouts->view("Category/create");
          return;
      }else{
        
            // Is form Valid        
        $data = array(
            'code' => $this->input->post('code'),
            'category' => $this->input->post('category'),
            'unit' => $this->input->post('unit'),
            );

        // Save Data
        $this->Category_Model->add($data);
        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Category added successfully!</h4></div>');
        //redirect to category page
        redirect("Category",'refresh');
    }
}

    // clear category form
public function clear()
{
       //redirect to Category page
    redirect("Category",'refresh');
}

public function edit()
{
        //check if the user is logged in or not
    $this->isLoggedIn();

     //check has permissions
       if (!$this->permissions->has_permission('category_edit', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

    $userId = $this->uri->segment(3); // get id from url

    if ($userId != null) {
        $user = $this->Category_Model->get_by_id($userId); //laod category data by id

        $data["selectedUser"] = $user;
        $data["isLog"] = 1;


        $this->layouts->view("Category/edit", $data);

    }

}

function update()
{
        //check if the user is logged in or not
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);

    $this->form_validation->set_rules('code', 'Code','required');
    $this->form_validation->set_rules('category', 'Category','required');
    $this->form_validation->set_rules('unit', 'Unit','required');
    
    if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
        $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
            ,'</div>');
            // Load view
        $user = $this->Category_Model->get_by_id($userId);


        $data["selectedUser"] = $user;
        $data["isLog"] = 1;
        
        $this->layouts->view("Category/edit", $data);
        return;
    }else{

        $userData = array(
            'code' => $this->input->post('code'),
            'category' => $this->input->post('category'),
            'unit' => $this->input->post('unit'),
            );

        $this->Category_Model->update_by_id($userId, $userData);}

        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Category updated successfully!</h4></div>');

        //redirect to category page
        redirect('Category','refresh');

    }

    function Delete()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

         //check has permissions
       if (!$this->permissions->has_permission('category_delete', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }
        
        $userId = $this->uri->segment(3);
        $this->Category_Model->delete_by_id($userId);

        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Category deleted successfully!</h4></div>');
        //redirect to category page
        redirect('Category','refresh');
    }
}
?>