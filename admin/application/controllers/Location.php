<?php
class Location extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Location_Model"); //load location model
        $this->isLoggedIn();

        $loggedUser = $this->session->userdata("id");
      $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);

    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }

// Load all location data into view
    public function index()
    {
     //check if the user is logged in or not
      $this->isLoggedIn();

       if (!$this->permissions->has_permission('location_list', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

//get all data from db
      $data = array(
        'locationList'=> $this->Location_Model->GetAll());

      $this->layouts->view("Location/index",$data);
  }

// Load location create page
  public function create()
  {
     //check if the user is logged in or not
      $this->isLoggedIn();

//load create view
      $this->layouts->view("Location/create");
  }

// Save location form data into DB
  public function save()
  {
     //check if the user is logged in or not
      $this->isLoggedIn();

    //set validation rules
      $this->form_validation->set_rules('code', 'Code','required');
      $this->form_validation->set_rules('location', 'Location','required');

      if ($this->form_validation->run() == FALSE) {
        // Is form Invalid
        $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
            ,'</div>');

        // Load view
        $this->layouts->view("Location/create");
        return;
    }else{

        // Is form Valid     
        //get data from input   
        $data = array(
            'code' => $this->input->post('code'),
            'location' => $this->input->post('location'),
            
            );

        // Save Data
        $this->Location_Model->add($data);
        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Location added successfully!</h4></div>');
        //redirect to location page
        redirect("Location",'refresh');
    }
}


// clear location form
public function clear()
{
//redirect to location page
    redirect("Location",'refresh');
}


public function edit()
{
     //check if the user is logged in or not
  $this->isLoggedIn();

  //get user id from url segment 3
  $userId = $this->uri->segment(3);


  if ($userId != null) {
        //if id not null get by id
    $user = $this->Location_Model->get_by_id($userId);

    $data["selectedUser"] = $user;
    $data["isLog"] = 1;

    $this->layouts->view("Location/edit", $data);

}

}

function update()
{
     //check if the user is logged in or not
  $this->isLoggedIn();

  //get id from url segment 3
  $userId = $this->uri->segment(3);

// set validation rules
  $this->form_validation->set_rules('code', 'Code','required');
  $this->form_validation->set_rules('location', 'Location','required');

  if ($this->form_validation->run() == FALSE) {
// Is form Invalid
    $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
        ,'</div>');
// Load view
    $user = $this->Location_Model->get_by_id($userId);


    $data["selectedUser"] = $user;
    $data["isLog"] = 1;

    $this->layouts->view("Location/edit", $data);
    return;
}else{
//is form valid
    $userData = array(
        'code' => $this->input->post('code'),
        'location' => $this->input->post('location'),
        );


    $this->Location_Model->update_by_id($userId, $userData);}


// Set success message as flash session
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Location Updated successfully!</h4></div>');

//redirect to location page
    redirect('Location','refresh');
}

function Delete()
{
         //check if the user is logged in or not
  $this->isLoggedIn();
  
  $userId = $this->uri->segment(3);
  $this->Location_Model->delete_by_id($userId);

// Set success message as flash session
  $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Location deleted successfully!</h4></div>');

//redirect to location page
  redirect('Location','refresh');
}
}
?>
