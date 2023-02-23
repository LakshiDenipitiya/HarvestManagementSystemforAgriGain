<?php
class Vehicle extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Vehicle_Model");       //load the vehicle model
        $this->load->model("Location_Model");   //load the location model
         $this->isLoggedIn();

        $loggedUser = $this->session->userdata("id");
      $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);

    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all vehicle data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        if (!$this->permissions->has_permission('vehicle_list', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $data = array(
            'vehicleList'=> $this->Vehicle_Model->GetAllwithDetails());

        $this->layouts->view("Vehicle/index",$data);
    }

    // Load vehicle create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $locationDbList = $this->Location_Model->GetAll();

        $locationSelectionOptions[""]="Select a Location";

        foreach ($locationDbList as $key => $value) {
        $locationSelectionOptions[$value->id] = $value->location;
        }

        $data['locationList'] = $locationSelectionOptions;

        $this->layouts->view("Vehicle/create", $data);
    }

        

    // Save vehicle form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('location_id', 'Location','required');
        $this->form_validation->set_rules('vehicleno', 'Vehicle No', 'required');
        $this->form_validation->set_rules('ownername', 'Name of the owner','required');
    

        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');

            $locationDbList = $this->Location_Model->GetAll();

            $locationSelectOptions[""] = "Select a Location";//to pass a empty value

            foreach ($locationDbList as $key => $value) {
            $locationSelectionOptions[$value->id] = $value->location; //to load values from database
            }

            $data['locationList'] = $locationSelectionOptions;

                
            // Load view
            $this->layouts->view("Vehicle/create", $data);
            return;
            
        }else{
            
            // Is form Valid        
            $data = array(
                'location_id' => $this->input->post('location_id'),
                'vehicleno'=>$this->input->post('vehicleno'),
                'ownername'=>$this->input->post('ownername'),   
                'status'=>1                     
                );

        // Save Data
            $this->Vehicle_Model->add($data);
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Vehicle added successfully!</h4></div>');
        //redirect to vehicle page
            redirect("Vehicle",'refresh');
        }
    }
                                    

    // clear vehicle form
    public function clear()
    {
       //redirect to vehicle page
        redirect("Vehicle",'refresh');
    }


public function update_status($id,$status)
{
    $result = $this->Vehicle_Model->update_status($id, $status);

    if($result) {
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Vehicle status updated successfully!</h4></div>');
    }else{
       $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Unsuccessful update!</h4></div>');
   }
            //redirect to vehicle page    
   redirect('Vehicle','refresh');
}



    public function edit()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Vehicle_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

          $locationDbList = $this->Location_Model->GetAll();

        $locationSelectionOptions[""]="Select a Location"; // to pass empty value

        foreach ($locationDbList as $key => $value) {
        $locationSelectionOptions[$value->id] = $value->location; //to load values form database
        }

        $data['locationList'] = $locationSelectionOptions;



            $this->layouts->view("Vehicle/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('location_id', 'Location','required');
        $this->form_validation->set_rules('vehicleno', 'Vehicle No', 'required');
        $this->form_validation->set_rules('ownername', 'Name of the owner','required');

        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Vehicle_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;



  $locationDbList = $this->Location_Model->GetAll();

        $locationSelectionOptions[""]="Select a Location"; // to pass empty value

        foreach ($locationDbList as $key => $value) {
        $locationSelectionOptions[$value->id] = $value->location; //to load values form database
        }

        $data['locationList'] = $locationSelectionOptions;



            $this->layouts->view("Vehicle/edit", $data);
            return;
        }else{
            $userData = array(
                'location_id' => $this->input->post('location_id'),
                'vehicleno'=>$this->input->post('vehicleno'),
                'ownername'=>$this->input->post('ownername'), 
                );

          
            $this->Vehicle_Model->update_by_id($userId, $userData);

        }

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Vehicle updated successfully!</h4></div>');

        //redirect to vehicle page
            redirect('Vehicle','refresh');
        }



      function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            
              $userId = $this->uri->segment(3);
            $this->Vehicle_Model->delete_by_id($userId);

      
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Vehicle deleted successfully!</h4></div>');

        //redirect to vehicle page
            redirect('Vehicle','refresh');
        }

    }
    ?>
