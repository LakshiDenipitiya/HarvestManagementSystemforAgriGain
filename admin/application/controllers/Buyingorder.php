<?php
class Buyingorder extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Buyingorder_Model");     //load the buyingorder models
        $this->load->model("Location_Model");     //load the location models
        $this->load->model("Buyer_Model");       //load the buyer models
        $this->load->model("Buyeritem_Model");        //load the buyingitem model
        $this->load->model("Item_Model");        //load the Item Model
    

        
          $this->isLoggedIn();

        $loggedUser = $this->session->userdata("id");
      $this->allowedPermissionCodes = $this->Module_Model->get_permission_codes_for_stakeholder_id($loggedUser);

    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }
    
    // Load all buyingorder data into view
    public function index()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();

        //check has permissions
       if (!$this->permissions->has_permission('buyingorder_list', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $data['buyingorderList'] = $this->Buyingorder_Model->getAllBuyingOrders();
 
        //load view
        $this->layouts->view("Buyingorder/index",$data);
    }

    // Load Supplyorder create page
    public function create()
    { 
        //check if the user is logged in or not
        $this->isLoggedIn();

        //check has permissions
       if (!$this->permissions->has_permission('buyingorder_create', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        //get all data from the relevent tables
        $locationDbList = $this->Location_Model->GetAll();
     //   $employeeDbList = $this->Employee_Model->GetAll();
     //   $itemDbList = $this->Item_Model->GetAll();
        $buyerDbList = $this->Buyer_Model->GetAllactivebuyers();


        $locationSelectOptions[""] = "Select an location";//to pass a empty value

        foreach ($locationDbList as $key => $value) {
                $locationSelectOptions[$value->id] = $value->location;//to load values from database
            }



            $buyerSelectionOptions[""]="Select a Buyer";

            foreach ($buyerDbList as $key => $value) {
                $buyerSelectionOptions[$value->id] = $value->firstname;//to load values from database
            }

             //load data relevent list from defined dropdowns
            $data['locationList'] = $locationSelectOptions;
            $data['itemList'] = [];
        //    $data['buyingorderList'] = [];
            $data['buyerList'] = $buyerSelectionOptions;

            $this->layouts->view("Buyingorder/create",$data);
        }


        // Save buyingorder form data into DB
        public function savebuyingorder(){

             //check if the user is logged in or not
            $this->isLoggedIn();

            $id = $this->input->post('id');
            $buyerid = $this->input->post('buyerid');
            $fromd = $this->input->post('fromd');
            $tod = $this->input->post('tod');
            $loc = $this->input->post('loc');
            $b_bill_address = $this->input->post('b_bill_address');
            $gtotal  =$this->input->post('gtotal');

            
            $bordarr['buyer_id'] = $buyerid;
            $bordarr['date_from'] = $fromd;
            $bordarr['date_to'] = $tod;
            $bordarr['location_id'] = $loc;
            $bordarr['b_billing_address'] = $b_bill_address;
            $bordarr['bo_grand_total'] = $gtotal;
            $boid = $this->Buyingorder_Model->add_new_order($bordarr); // add date to buying order table

            for($i=0;$i<$id;$i++){
               if($this->input->post('catid'.$i)){ 
                $catid = $this->input->post('catid'.$i);
                $qty = $this->input->post('qty'.$i);
                $sellprice = $this->input->post('sellprice'.$i);

                

                $boitems['buyingorder_bo_id'] = $boid;
                $boitems['item_i_id'] = $catid;
                $boitems['item_quantity'] = $qty;
                $boitems['bo_balance_qty'] = $qty;
                $boitems['sellingprice'] = $sellprice;

                $this->Buyingorder_Model->add_bo_items($boitems); // add date to buying order item table
            }
            }
             
            // Set success message as flash session

            if($boid){
               $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <h4><i class="icon fa fa-check"></i> Buying order created successfully!</h4></div>'); 
               redirect("Buyingorder/index",'refresh');
           }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <h4><i class="icon fa fa-check"></i> Buying order create Error!</h4></div>');

            //redirect to Buyingorder page
              redirect("Buyingorder/index",'refresh');
           }
           
         
          }


        // clear buyingorder form
    public function clear()
    {
       //redirect to buyingorder page
        redirect("Buyingorder",'refresh');
    }


   public function editbuyingorder(){
          //check if the user is logged in or not
        $this->isLoggedIn();

        //check has permissions
       if (!$this->permissions->has_permission('buyingorder_edit', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }

        $id=$this->uri->segment(3); //get order id
        $buyerid=$this->uri->segment(4); // get buying order id
        $data['bo_datails']=$this->Buyingorder_Model->get_buying_order($id); // load buying order data
        $data['buyingorderList'] = $this->Buyingorder_Model->get_item_by_buyingorder($id); //laod buying order item

         //get all data from the relevent tables
         $data['locationDbList'] = $locationDbList = $this->Location_Model->GetAll();
     //   $employeeDbList = $this->Employee_Model->GetAll();
        $itemDbList = $this->Item_Model->getAllbybuyer($buyerid);
        $data['buyerDbList'] = $buyerDbList = $this->Buyer_Model->GetAllactivebuyers();


        $locationSelectOptions[""] = "Select an location";//to pass a empty value

        foreach ($locationDbList as $key => $value) {
                $locationSelectOptions[$value->id] = $value->location;//to load values from database
            }

               $itemSelectOptions[""] = "Select an Item";//to pass a empty value

        foreach ($itemDbList as $key => $value) {
                $itemSelectOptions[$value->i_id] = $value->item;//to load values from database
            }

            $buyerSelectionOptions[""]="Select a Buyer";

            foreach ($buyerDbList as $key => $value) {
                $buyerSelectionOptions[$value->id] = $value->firstname;//to load values from database
            }

             //load data relevent list from defined dropdowns
            $data['locationList'] = $locationSelectOptions;
            $data['itemList'] = [];
        //    $data['buyingorderList'] = [];
            $data['buyerList'] = $buyerSelectionOptions;
            

           
            $this->layouts->view("Buyingorder/edit",$data);
        }

    
          // Save buyingorder form data into DB
        public function updatebuyingorder(){

             //check if the user is logged in or not
            $this->isLoggedIn();

            $boid= $this->input->post('boid');

            $id = $this->input->post('id');
            $buyerid = $this->input->post('buyerid');
            $fromd = $this->input->post('fromd');
            $tod = $this->input->post('tod');
            $loc = $this->input->post('loc');
            $b_bill_address = $this->input->post('b_bill_address');
            $gtotal  =$this->input->post('gtotal');
            
            $bordarr['buyer_id'] = $buyerid;
            $bordarr['date_from'] = $fromd;
            $bordarr['date_to'] = $tod;
            $bordarr['location_id'] = $loc;
            $bordarr['b_billing_address'] = $b_bill_address;
            $bordarr['bo_grand_total'] = $gtotal;
            $this->Buyingorder_Model->update_buying_order($bordarr,$boid); // update buying order table
            
            //delete buying order item according to id
            $this->Buyingorder_Model->delete_buyingorder_item($boid);  

            for($i=1;$i<=$id;$i++){
              if($this->input->post('catid'.$i)){  
                $catid = $this->input->post('catid'.$i);
                $qty = $this->input->post('qty'.$i);
                $sellprice = $this->input->post('sellprice'.$i);

                

                $boitems['buyingorder_bo_id'] = $boid;
                $boitems['item_i_id'] = $catid;
                $boitems['item_quantity'] = $qty;
                $boitems['bo_balance_qty'] = $qty;
                $boitems['sellingprice'] = $sellprice;

                // add data to the buying order item table
                $this->Buyingorder_Model->add_bo_items($boitems); 
            }
            }
            
            // Set success message as flash session

            if($boid){
               $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <h4><i class="icon fa fa-check"></i> Buying order updated successfully!</h4></div>'); 
               redirect("Buyingorder/index",'refresh');
           }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <h4><i class="icon fa fa-check"></i> Buying order upadate Error!</h4></div>');
            
             //redirect to Buyingorder page
            redirect("Buyingorder/index",'refresh');
           }
           
                        
          }



 //for view button
    public function view()
    {
            //to check is user logged
        $this->isLoggedIn();

        $buyingorderId = $this->uri->segment(3); //get data from url

        if ($buyingorderId != null) {

           //load buying order data by id
            $data['buyer'] = $this->Buyingorder_Model->get_by_id($buyingorderId); 

            //laod buying order item by id
            $data['buyingorderList'] = $this->Buyingorder_Model->get_item_by_buyingorder($buyingorderId);

            $this->layouts->view("Buyingorder/view", $data);
        }

    }

    // toggle activate deactivate
      public function update_status($id,$status)
        {
            $result = $this->Buyingorder_Model->update_status($id, $status);

            if($result) {
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Buying order status updated successfully!</h4></div>');
            }else{
               $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Unsuccessful update!</h4></div>');
           }
                    //redirect to buyingorder page    
           redirect('Buyingorder','refresh');
        }


    function Delete()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();
        
        $userId = $this->uri->segment(3);
        $this->Buyingorder_Model->delete_by_id($userId);

        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Buying order deleted successfully!</h4></div>');

        //redirect to Buyingorder page
        redirect('Buyingorder','refresh');
    }

  //laod buyer item
  function get_buyer_items(){
    $bid = $this->input->post('buyer_id');
    $getitems = $this->Buyingorder_Model->get_buyer_items($bid);
    echo json_encode($getitems);
  }


 

}
?>
