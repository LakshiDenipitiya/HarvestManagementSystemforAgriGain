<?php
class Buyingorder extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Buyingorder_Model");     //load the buyingorder models
        $this->load->model("Location_Model");     //load the location models
        $this->load->model("Buyer_Model");       //load the buyer models
    //    $this->load->model("Employee_Model");       //load the employee model
        $this->load->model("Buyeritem_Model");        //load the buyingitem model
        $this->load->model("Item_Model");        //load the Item Model
          $this->load->model("Web_model"); 
    //    $this->load->model("Category_Model");        //load the Category Model

        
        $this->isLoggedIn();

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

        $data['buyingorderList'] = $this->Buyingorder_Model->getAllBuyingOrders();
 
        //load view
        $this->layouts->view("Buyingorder/index",$data);
    }

    // Load Supplyorder create page
    public function create()
    { 
        //check if the user is logged in or not
        $this->isLoggedIn();

        $data['user_records'] = $this->Web_model->get_user_datails();

        //get all data from the relevent tables
        $locationDbList = $this->Location_Model->GetAll();
     //   $employeeDbList = $this->Employee_Model->GetAll();
        $itemDbList = $this->Item_Model->getAllbybuyer();
        $buyerDbList = $this->Buyer_Model->GetAll();


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
            $boid = $this->Buyingorder_Model->add_new_order($bordarr);

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

                $this->Buyingorder_Model->add_bo_items($boitems);
            }
            }
             //redirect to Buyingorder page
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
        $id=$this->uri->segment(3);
        $data['bo_datails']=$this->Buyingorder_Model->get_buying_order($id);
        $data['buyingorderList'] = $this->Buyingorder_Model->get_item_by_buyingorder($id);

        $data['user_records'] = $this->Web_model->get_user_datails();

        //get all data from the relevent tables
         $data['locationDbList'] = $locationDbList = $this->Location_Model->GetAll();
     //   $employeeDbList = $this->Employee_Model->GetAll();
        $itemDbList = $this->Item_Model->getAllbybuyer();
        $buyerDbList = $this->Buyer_Model->GetAll();


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
            $this->Buyingorder_Model->update_buying_order($bordarr,$boid);
            

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

                $this->Buyingorder_Model->add_bo_items($boitems);
            }
            }
             //redirect to Buyingorder page
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
            redirect("Buyingorder/index",'refresh');
           }
           
                
       

          
          }



 
    public function view()
    {
            //to check is user logged
        $this->isLoggedIn();

        $buyingorderId = $this->uri->segment(3);

        if ($buyingorderId != null) {

           /* $buying_order = $this->Buyingorder_Model->get_by_id($buyingorderId);
            $location = $this->Location_Model->get_by_id($buying_order->location_id);   
            $buyer = $this->Buyer_Model->get_by_id($buying_order->buyer_id);
            $item = $this->Buyingorderitem_Model->get_item_by_buyingorder($buyingorderId);
         
            
            $data["location"] = $location;
            $data["employee"] = $employee;
            $data["buyer"] = $buyer;
            $data["item"] = $item;
            $data["selectedRequest"] = $buying_order;
            $data["isLog"] = 1; */

            $data['buyer'] = $this->Buyingorder_Model->get_by_id($buyingorderId);
            $data['buyingorderList'] = $this->Buyingorder_Model->get_item_by_buyingorder($buyingorderId);

            $this->layouts->view("Buyingorder/view", $data);
        }

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

    public function updateStatus(){
    $val_request=$this->input->post('request');
    $val_event=$this->input->post('event');
    $data['status']=$val_event;
    $result = $this->Buyingorder_Model->update_by_id($val_request,$data);
    
}

  /*   public function buyingorderstatus(){
        $data = new stdClass();
        $user_id = $this->session->userdata('id');
        $data = array('buyingorderStatus'=>$this->Buyingorder_Model->getbuyingorderstatus($user_id));
        $this->layouts->view('Buyingorder/index.php',$data);
    }*/



  function get_buyer_items(){
    $bid = $this->input->post('buyer_id');
    $getitems = $this->Buyingorder_Model->get_buyer_items($bid);
    echo json_encode($getitems);
  }


 

}
?>
