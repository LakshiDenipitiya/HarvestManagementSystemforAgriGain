<?php
class Buyer extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Buyer_Model");    //load the buyer model
         $this->load->model("Item_Model");       //load the item model
        $this->load->model("Category_Model");   //load the category model
         $this->load->model("Buyeritem_Model"); //load the buyeritem model
     
               
         $this->isLoggedIn();

         // get permission for logged user id
        $loggedUser = $this->session->userdata("id");
      $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);

    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all buyer data into view
    public function index()

	{   //check if the user is logged in or not
        $this->isLoggedIn();

       if (!$this->permissions->has_permission('buyer_list', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }
        
        //load to buyer_list all data from the supplier table
        $buyer_list = $this->Buyer_Model->GetAll();

        foreach ($buyer_list as $key => $buy) {
            $buy->items = $this->Buyeritem_Model->get_items_by_buyer($buy->id);  //array
        }


        //load data form the db
        $data = array(
            'buyerList'=> $buyer_list);


        //load data into index.php
        $this->layouts->view("Buyer/index",$data);
    }

    // Load buyer create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        if (!$this->permissions->has_permission('buyer_create', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $data['titleDropdownOption'] = array(
            ''  => 'Select',
            'Mr'    => 'Mr',
            'Mrs'   => 'Mrs',
            'Ms'   => 'Ms',
            );

        //load to itemDbList all data from the item table
          $itemDbList = $this->Item_Model->GetAll();
          $itemSelectOptions;//to pass a empty value

          foreach ($itemDbList as $key => $value) {
                $itemSelectOptions[$value->i_id] = $value->item;//to load values from database
            }
            $data['itemList'] = $itemSelectOptions;


        $this->layouts->view("Buyer/create", $data);
    }

    // Save buyer form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('firstname', 'First Name','required');
        $this->form_validation->set_rules('lastname', 'Last Name','required');
        $this->form_validation->set_rules('nicno', 'NIC No','required|min_length[10]|max_length[12]|is_unique[buyer.nicno]');
        $this->form_validation->set_rules('no', 'No','required');
        $this->form_validation->set_rules('lane', 'Lane','required');
        $this->form_validation->set_rules('city', 'City','required');
        $this->form_validation->set_rules('phoneno', 'Phone No','required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('email', 'Email','required');
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
            $this->layouts->view("Buyer/create", $data);
            return;
        }else{
            
            // Is form Valid        
            $buy_data = array(
                'title'=>$this->input->post('title'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'nicno' => $this->input->post('nicno'),
                'no' => $this->input->post('no'),
                'lane' => $this->input->post('lane'),
                'city' => $this->input->post('city'),
                'phoneno' => $this->input->post('phoneno'),
                'email' => $this->input->post('email'),
                'status'=>1
                );
            

        // get buyer id
            $insert_id = $this->Buyer_Model->add($buy_data);

            //add buyer item details to the buyeritem table
              $item_ids = $this->input->post('item_i_id[]');
              if ($insert_id) {
                foreach ($item_ids as $key => $value) {
                    $ed = array('item_i_id' => $value, 'buyer_id' => $insert_id);
                    $this->Buyeritem_Model->add($ed);
                }

                //get inserted id and data to create user account function
                $user = $this->Buyer_Model->create_user_account($insert_id,$buy_data);
                if ($user) {
                // send welcome email
                    $this->send_account_details_email($user,$buy_data);
                }
            }
 
            
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Buyer added successfully!</h4></div>');
        //redirect to buyer page
           redirect("Buyer",'refresh');
        }
    }

  /*  function x(){
        $to = 'email address';
        $sbj = 'vsvsdff';
        $msg = 'dfs dsdf sfsdf sdfasdf';
        $this->mail_push($to,$sbj,$msg);
    }


  function mail_push($to,$sbj,$msg){
      
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        $mail->isSMTP();
        $mail->Host     = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        //$mail->Username = 'hello@lcs.pathe.lk';
        //$mail->Password = 'Pathe@123';

        $mail->Username = 'test@lcs.pathe.lk';
        $mail->Password = 'T3st@123';

        $mail->Port     = 587;
        $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
       
        $mail->setFrom('test@lcs.pathe.lk', 'CFS');
        $mail->addReplyTo('agrigainssl@gmail.com', 'CFS');
        $mail->addAddress($to);
        $mail->Subject = $sbj;
        $mail->isHTML(true);
        $mailContent = $msg;
        $mail->Body = $mailContent;
      
        if(!$mail->send()){
            echo 'Mail could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Mail has been sent';
        }
    }*/


    public function send_account_details_email($user,$buy_data)
    {
         //email encryption
    $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
    //SMTP & email configuration
    $config =array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'agrigainssl@gmail.com',
        'smtp_pass' => 'agrigain123',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1'
        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");


        $this->load->library('email', $config);

        $this->email->from('agrigainssl@gmail.com', 'AgriGain');
        $this->email->to($buy_data['email']);

        $this->email->subject('Welcome to AgriGain');

        $this->email->set_mailtype("html");

        $message = "Dear ".$buy_data['firstname'].", <br><br> Welcome to AgriGain. <br> Here is your username and password. Please change it once you have logged in. <br><br> Username: ".$user['username']."<br> Password: ".$user['password']."<br><br> Thnak You for joining with us. <br><br>Best Regards, <br> Team AgriGain.";

        $this->email->message($message);

        $this->email->send();
    
    }


    // clear buyer form
    public function clear()
    {
       //redirect to buyer page
        redirect("Buyer",'refresh');
    }

    public function edit()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //get the record id from the 3rd segment in url
        $userId = $this->uri->segment(3);

        //check whether record id not null
        if ($userId != null) {
            //if it is not load the buyer data to the user variable from the id
            $user = $this->Buyer_Model->get_by_id($userId);

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

                 // buyer items
            $buyer_item_list = $this->Buyeritem_Model->get_items_by_buyer($userId);
            $buyer_item_id_list = [];


            foreach ($buyer_item_list as $key => $value) {
                $buyer_item_id_list[$key] = $value->i_id;
            }

            $itemDbList = $this->Item_Model->GetAll();

        $itemSelectOptions[""] = "Select a Item";//to pass a empty value
        foreach ($itemDbList as $key => $value) {
            $itemSelectOptions[$value->i_id] = $value->item;//to load values from database
        }
        $data['itemList'] = $itemSelectOptions;
        $data['buyer_item_id_list'] = $buyer_item_id_list;


            //load the buyer edit view
            $this->layouts->view("Buyer/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

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
            $user = $this->Buyer_Model->get_by_id($userId);

              //set data in the user variable to selected user
            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

            $data['titleDropdownOption'] = array(
                ''  => '--Select--',
                'Mr'    => 'Mr',
                'Mrs'   => 'Mrs',
                'Ms'   => 'Ms',
                );
            
             //load the buyer edit view
            $this->layouts->view("Buyer/edit", $data);
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
            $this->Buyer_Model->update_by_id($userId, $userData);


             // Update buyer item
            $this->Buyeritem_Model->delete_by_buyer_id($userId);
            $selected_item = $this->input->post('item_i_id[]');

            foreach ($selected_item as $key => $item_i_id) {
                 $data = array(
                    'item_i_id' => $item_i_id,
                    'buyer_id' => $userId 
                );
                 $this->Buyeritem_Model->add($data);
             }


        }


        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Buyer updated successfully!</h4></div>');

        //redirect to buyer page
            redirect('Buyer','refresh');
        }

    
    // activate / deactivate the row
        public function update_status($id,$status)
        {
            $result = $this->Buyer_Model->update_status($id, $status);

            if($result) {
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Buyer status updated successfully!</h4></div>');
            }else{
               $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Unsuccessful update!</h4></div>');
           }
                    //redirect to buyer page    
           redirect('Buyer','refresh');
        }



        function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();

        //get the user id by url segment 3
            $userId = $this->uri->segment(3);
        //delete by id
            $this->Buyer_Model->delete_by_id($userId);

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Buyer deleted successfully!</h4></div>');

        //redirect to buyer page
            redirect('Buyer','refresh');
        }
    }
    ?>
