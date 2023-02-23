<?php
class Item extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Item_Model");       //load the item model
        $this->load->model("Category_Model");   //load the category model
        $this->isLoggedIn();

        $loggedUser = $this->session->userdata("id");
      $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);

    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all Item data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();
        //check has permissions
       if (!$this->permissions->has_permission('item_list', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $data = array(
            'itemList'=> $this->Item_Model->GetAllwithDetails());

        $this->layouts->view("Item/index",$data);
    }

    // Load Item create page
    public function create()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //check has permissions
       if (!$this->permissions->has_permission('item_create', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $categoryDbList = $this->Category_Model->GetAll();

        $categorySelectionOptions[""]="Select a Category";

        foreach ($categoryDbList as $key => $value) {
        $categorySelectionOptions[$value->id] = $value->category; //to load values from database
        }

        $data['categoryList'] = $categorySelectionOptions;

        $this->layouts->view("Item/create", $data);
    }

        

    // Save item form data into DB
    public function save()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $this->form_validation->set_rules('category_id', 'Catagory of Item','required');
        $this->form_validation->set_rules('i_code', 'Code', 'required');
        $this->form_validation->set_rules('item', 'Item name','required');
        $this->form_validation->set_rules('itemimage', 'Image of Item','required');
        $this->form_validation->set_rules('buyingprice', 'Buying Price','numeric|required');
        $this->form_validation->set_rules('sellingprice', 'Selling Price','numeric|required');
        //$this->form_validation->set_rules('status', 'Status','required');


        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');

            $categoryDbList = $this->Category_Model->GetAll();

            $categorySelectOptions[""] = "Select a category";//to pass a empty value

            foreach ($categoryDbList as $key => $value) {
            $categorySelectionOptions[$value->id] = $value->category; //to load values from database
            }

            $data['categoryList'] = $categorySelectionOptions;

                
            // Load view
            $this->layouts->view("Item/create", $data);
            return;
            
        }else{
            
            // Is form Valid        
            $data = array(
                'category_id' => $this->input->post('category_id'),
                'i_code'=>$this->input->post('i_code'),
                'item'=>$this->input->post('item'),
                'itemimage'=>$this->input->post('itemimage'),
                'buyingprice' => $this->input->post('buyingprice'),
                'sellingprice' => $this->input->post('sellingprice'),
                                       
                );

        // Save Data
            $this->Item_Model->add($data);
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Item added successfully!</h4></div>');
        //redirect to Item page
            redirect("Item",'refresh');
        }
    }

            public function do_upload(){
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '100';
                    $config['max_width'] = '1024';
                    $config['max_height'] = '768';
                }
                                    

    // clear Item form
    public function clear()
    {
       //redirect to Item page
        redirect("Item",'refresh');
    }


//toggel ativate /deactivate
public function update_status ($item_id,$status)
{
    $result = $this->Item_Model->update_status($item_id, $status);

    if($result) {
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Item status updated successfully!</h4></div>');
    }else{
       $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Unsuccessful update!</h4></div>');
   }
            //redirect to item page    
   redirect('Item','refresh');
}



    public function edit()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //check has permissions
       if (!$this->permissions->has_permission('item_edit', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $userId = $this->uri->segment(3);

        if ($userId != null) {
            $user = $this->Item_Model->get_by_id($userId);

            $data["selectedUser"] = $user;
            $data["isLog"] = 1;

          $categoryDbList = $this->Category_Model->GetAll();

        $categorySelectionOptions[""]="Select a Category"; // to pass empty value

        foreach ($categoryDbList as $key => $value) {
        $categorySelectionOptions[$value->id] = $value->category; //to load values form database
        }

        $data['categoryList'] = $categorySelectionOptions;



            $this->layouts->view("Item/edit", $data);

        }

    }

    function update()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        $userId = $this->uri->segment(3);

        $this->form_validation->set_rules('category_id', 'Category of Item','required');
        $this->form_validation->set_rules('i_code', 'Code', 'required|max_length[8]');
        $this->form_validation->set_rules('item', 'Item name','required');
        $this->form_validation->set_rules('itemimage', 'Image of Item','required');
        $this->form_validation->set_rules('buyingprice', 'Buying Price','numeric|required');
        $this->form_validation->set_rules('sellingprice', 'Selling Price','numeric|required');
      //  $this->form_validation->set_rules('status', 'Status','required');

        
        if ($this->form_validation->run() == FALSE) {
            // Is form Invalid
            $this->form_validation->set_error_delimiters('<div class="callout callout-danger">'
                ,'</div>');
            // Load view
            $user = $this->Item_Model->get_by_id($userId);


            $data["selectedUser"] = $user;
            $data["isLog"] = 1;



  $categoryDbList = $this->Category_Model->GetAll();

        $categorySelectionOptions[""]="Select a Category"; // to pass empty value

        foreach ($categoryDbList as $key => $value) {
        $categorySelectionOptions[$value->id] = $value->category; //to load values form database
        }

        $data['categoryList'] = $categorySelectionOptions;



            $this->layouts->view("Item/edit", $data);
            return;
        }else{
            $userData = array(
                'category_id' => $this->input->post('category_id'),
                'i_code'=>$this->input->post('i_code'),
                'item'=>$this->input->post('item'),
                'itemimage'=>$this->input->post('itemimage'),
                'buyingprice' => $this->input->post('buyingprice'),
                'sellingprice' => $this->input->post('sellingprice'),
          //      'status' => $this->input->post('Status'),    
                );

          
            $this->Item_Model->update_by_id($userId, $userData);

        }

        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Item updated successfully!</h4></div>');

        //redirect to item page
            redirect('Item','refresh');
        }


public function view()
{
            //to check is user logged
    $this->isLoggedIn();

    $userId = $this->uri->segment(3);

    if ($userId != null) {

        $user = $this->Item_Model->get_by_id($userId);
             
        $data["selectedUser"] = $user;
        $data["isLog"] = 1;

        $this->layouts->view("Item/view", $data);

    }

}

      function Delete()
        {
        //check if the user is logged in or not
            $this->isLoggedIn();
            
            
              $userId = $this->uri->segment(3);
            $this->Item_Model->delete_by_id($userId);

      
        // Set success message as flash session
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Item deleted successfully!</h4></div>');

        //redirect to item page
            redirect('Item','refresh');
        }


        
    }
    ?>
