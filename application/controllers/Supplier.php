<?php
class Supplier extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Supplier_Model");
        $this->load->model("Location_Model");
         $this->load->model("Item_Model");
         $this->load->model("Supplieritem_Model");

      
    }

  
    
    // Load all supplier data into view
    public function index()

    {   

  //     if(!$this->permissions->has_permission('supplier_list',$this->permissions_codes)){
  //         $this->layouts->view("Nopermissions/index");
  //         return;
  //      }
        
 //load to supplier_list all data from the supplier table
        $supplier_list = $this->Supplier_Model->GetAll();

        foreach ($supplier_list as $key => $sup) {
            $sup->items = $this->Supplieritem_Model->get_items_by_supplier($sup->id);  //array('abc', 'asdjasl', 'aljshdas');
        }



        //load data form the db
        $data = array(
            'supplierList'=> $supplier_list);

        //load data into index.php
        $this->layouts->view("Supplier/index",$data);
    }

    // Load supplier create page
    public function create()
    {
        

        $data['titleDropdownOption'] = array(
            ''  => 'Select',
            'Mr'    => 'Mr',
            'Mrs'   => 'Mrs',
            'Ms'   => 'Ms',
            );

         $itemDbList = $this->Item_Model->GetAll();
          $itemSelectOptions;//to pass a empty value

          foreach ($itemDbList as $key => $value) {
                $itemSelectOptions[$value->i_id] = $value->item;//to load values from database
            }
            $data['itemList'] = $itemSelectOptions;

        $this->layouts->view("Supplier/create", $data);
    }

    // Save sipplier form data into DB
    public function save()
    {
        

        //set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('firstname', 'First Name','required');
        $this->form_validation->set_rules('lastname', 'Last Name','required');
        $this->form_validation->set_rules('nicno', 'NIC No','required|min_length[10]|max_length[12]|is_unique[supplier.nicno]');
        $this->form_validation->set_rules('no', 'No','required');
        $this->form_validation->set_rules('lane', 'Lane','required');
        $this->form_validation->set_rules('city', 'City','required');
        $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email','required|valid_email');
         $this->form_validation->set_rules('item_i_id[]', 'Item','required');

        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');

            $data['titleDropdownOption'] = array(
                ''  => 'Select',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );


                  $itemDbList = $this->Item_Model->GetAll();

        $itemSelectOptions[""] = "Select a Item";//to pass a empty value

        foreach ($itemDbList as $key => $value) {
                $itemSelectOptions[$value->i_id] = $value->item;//to load values from database
            }
            $data['itemList'] = $itemSelectOptions;
            

            // Load view
            $this->layouts->view("Supplier/create", $data);
            return;
        }else{
            
            // Is form Valid        
            $sup_data = array(
                'title'=>$this->input->post('title'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'nicno' => $this->input->post('nicno'),
                'no' => $this->input->post('no'),
                'lane' => $this->input->post('lane'),
                'city' => $this->input->post('city'),
                'phoneno' => $this->input->post('phoneno'),
                'email' => $this->input->post('email'),
                );
            

        // get supplier id
            $insert_id = $this->Supplier_Model->add($sup_data);

              $item_ids = $this->input->post('item_i_id[]');
              if ($insert_id) {
                foreach ($item_ids as $key => $value) {
                    $ed = array('item_i_id' => $value, 'supplier_id' => $insert_id);
                    $this->Supplieritem_Model->add($ed);
                }
                 //get inserted id and data to create user account function
            $user = $this->Supplier_Model->create_user_account($insert_id,$sup_data);


            if ($user) {
            // send welcome email
              //  $this->send_account_details_email($user,$sup_data);
            }
            }

       
            
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> "Thanks for registering with Agrigain!"</h4></div>');
        //redirect to login page
            redirect("index.php/Web/loginN",'refresh');
        }
    }

    public function send_account_details_email($user,$sup_data)
    {
         //email encryption
    $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
    //SMTP & email configuration
    $config =array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'agrigainssl@gmail.com',
        'smtp_pass' => 'agrigain123',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1'
        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");


        $this->load->library('email');

        $this->email->from('agrigainssl@gmail.com', 'AgriGain');
        $this->email->to($sup_data['email']);

        $this->email->subject('Welcome to AgriGain');

        $this->email->set_mailtype("html");

        $message = "Dear ".$sup_data['firstname'].", <br><br> Welcome to AgriGain. <br> Here is your username and password. Please change it once you have logged in. <br><br> Username: ".$user['username']."<br> Password: ".$user['password']."<br><br> Thnak You for joining with us. <br><br>Best Regards, <br> Team AgriGain.";

        $this->email->message($message);

        $this->email->send();
    }
    // clear supplier form
    public function clear()
    {
       //redirect to supplier page
        redirect("Supplier",'refresh');
    }

    public function edit()
    {
       

        //get the record id from the 3rd segment in url
        $userId = $this->uri->segment(3);

        //check whether record id not null
        if ($userId != null) {
            //if it is not load the supplier data to the user variable from the id
            $user = $this->Supplier_Model->get_by_id($userId);

            //set data in the user variable to selected user
            $data["selectedUser"] = $user;
            //is log =true
            $data["isLog"] = 1;

            $data['titleDropdownOption'] = array(
                ''  => 'Select',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );

      // supplier items
            $supplier_item_list = $this->Supplieritem_Model->get_items_by_supplier($userId);
            $supplier_item_id_list = [];


            foreach ($supplier_item_list as $key => $value) {
                $supplier_item_id_list[$key] = $value->i_id;
            }

            $itemDbList = $this->Item_Model->GetAll();

        $itemSelectOptions[""] = "Select a Item";//to pass a empty value
        foreach ($itemDbList as $key => $value) {
            $itemSelectOptions[$value->i_id] = $value->item;//to load values from database
        }
        $data['itemList'] = $itemSelectOptions;
        $data['supplier_item_id_list'] = $supplier_item_id_list;



            //load the supplier edit view
            $this->layouts->view("Supplier/edit", $data);

        }

    }

    function update()
    {
        

        //Get the id form the url
        $userId = $this->uri->segment(3);

        //set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('firstname', 'First Name','required');
        $this->form_validation->set_rules('lastname', 'Last Name','required');
        $this->form_validation->set_rules('nicno', 'NIC No','required|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('no', 'No','required');
        $this->form_validation->set_rules('lane', 'Lane','required');
        $this->form_validation->set_rules('city', 'City','required');
        $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email','required|valid_email');
        $this->form_validation->set_rules('item_i_id[]', 'Item','required');
        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Supplier_Model->get_by_id($userId);

              //set data in the user variable to selected user
            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $data['titleDropdownOption'] = array(
                ''  => '--Select--',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );
            
             //load the supplier edit view
            $this->layouts->view("Supplier/edit", $data);
            return;
        }else{

         // Is form Valid       
            $userData = array(
                'title'=>$this->input->post('title'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'), 
                'nicno' => $this->input->post('nicno'),
                'no' => $this->input->post('no'),
                'lane' => $this->input->post('lane'),
                'city' => $this->input->post('city'),
                'phoneno' => $this->input->post('phoneno'),
                'email' => $this->input->post('email'),
                );


         //update by id  
            $this->Supplier_Model->update_by_id($userId, $userData);

             // Update supplier item
            $this->Supplieritem_Model->delete_by_supplier_id($userId);
            $selected_item = $this->input->post('item_i_id[]');

            foreach ($selected_item as $key => $item_i_id) {
                 $data = array(
                    'item_i_id' => $item_i_id,
                    'supplier_id' => $userId 
                );
                 $this->Supplieritem_Model->add($data);
             }

        }


            



        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Your profile updated successfully!</h4></div>');

        //redirect to supplier page
            redirect('Supplier/view','refresh');
        }

        public function view()
        {
                

        $supplierId = $this->session->userdata('employee_id');

        if ($supplierId != null) {

            $data['supplier'] = $this->Supplier_Model->get_by_id($supplierId);
            $data['supplierList'] = $this->Supplier_Model->get_item_by_supplier($supplierId);

            $this->layouts->view("Supplier/view", $data);
            }

        }








     function Delete()
        {
            //to check is user logged
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);
    $this->Supplier_Model->delete_by_id($userId);


        // Set success message as flash session
    $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Supplier deleted successfully!</h4></div>');

        //redirect to supplier page
    redirect('Supplier','refresh');
}
    }
    ?>
