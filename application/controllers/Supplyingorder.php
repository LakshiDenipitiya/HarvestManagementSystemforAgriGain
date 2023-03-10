<?php
class Supplyingorder extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Supplyingorder_Model");     //load the Supplyingorder models
        $this->load->model("Location_Model");     //load the location models
        $this->load->model("Supplier_Model");       //load the supplier models
    //    $this->load->model("Employee_Model");       //load the employee model
        $this->load->model("Supplieritem_Model");        //load the supplieritem model
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

        $data['supplyingorderList'] = $this->Supplyingorder_Model->getAllSupplyingOrders();
 
        //load view
        $this->layouts->view("Supplyingorder/index",$data);
    }

    // Load Supplyingorder create page
    public function create()
    { 
        //check if the user is logged in or not
        $this->isLoggedIn();

           $data['user_records'] = $this->Web_model->get_user_datails();

        //get all data from the relevent tables
        $locationDbList = $this->Location_Model->GetAll();
     //   $employeeDbList = $this->Employee_Model->GetAll();
       $itemDbList = $this->Item_Model->getAllbysupplier();
        $supplierDbList = $this->Supplier_Model->GetAll();


        $locationSelectOptions[""] = "Select an location";//to pass a empty value

        foreach ($locationDbList as $key => $value) {
                $locationSelectOptions[$value->id] = $value->location;//to load values from database
            }

                  $itemSelectOptions[""] = "Select an Item";//to pass a empty value

        foreach ($itemDbList as $key => $value) {
                $itemSelectOptions[$value->i_id] = $value->item;//to load values from database
            }


            $supplierSelectionOptions[""]="Select a Supplier";

            foreach ($supplierDbList as $key => $value) {
                $supplierSelectionOptions[$value->id] = $value->firstname;//to load values from database
            }

             //load data relevent list from defined dropdowns
            $data['locationList'] = $locationSelectOptions;
             $data['itemList'] = [];
        //    $data['buyingorderList'] = [];
            $data['supplierList'] = $supplierSelectionOptions;

            $this->layouts->view("Supplyingorder/create",$data);
        }

        // Save buyingorder form data into DB
        public function savesupplyingorder(){

             //check if the user is logged in or not
            $this->isLoggedIn();

            $id = $this->input->post('id');
            $supplierid = $this->input->post('supplierid');
            $fromd = $this->input->post('fromd');
            $tod = $this->input->post('tod');
            $loc = $this->input->post('loc');
            $s_bill_address = $this->input->post('s_bill_address');
            $gtotal  =$this->input->post('gtotal');
            
            $sordarr['supplier_id'] = $supplierid;
            $sordarr['date_from'] = $fromd;
            $sordarr['date_to'] = $tod;
            $sordarr['location_id'] = $loc;
            $sordarr['s_billing_address'] = $s_bill_address;
            $sordarr['so_grand_total'] = $gtotal;
            $soid = $this->Supplyingorder_Model->add_new_order($sordarr);

            for($i=0;$i<$id;$i++){
                if($this->input->post('catid'.$i)){
                   $catid = $this->input->post('catid'.$i);
                    $qty = $this->input->post('qty'.$i);
                    $buyprice = $this->input->post('buyprice'.$i);

                    $soitems['supplyingorder_so_id'] = $soid;
                    $soitems['item_i_id'] = $catid;
                    $soitems['sitem_quantity'] = $qty;
                    $soitems['so_balance_qty'] = $qty;
                    $soitems['buying_price'] = $buyprice;

                    $this->Supplyingorder_Model->add_so_items($soitems); 
                }
                
            }
             //redirect to Supplyingorder page
            // Set success message as flash session

            if($soid){
               $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
           <h4><i class="icon fa fa-check"></i> Supplying order created successfully!</h4></div>'); 
               redirect("Supplyingorder/index",'refresh');
           }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
           <h4><i class="icon fa fa-check"></i> Supplying order create Error!</h4></div>');
            redirect("Supplyingorder/index",'refresh');
           }
           
      
          }


        // clear Supplyingorder form
    public function clear()
    {
       //redirect to Supplyingorder page
        redirect("Supplyingorder",'refresh');
    }


    public function editsupplyingorder(){
        //check if the user is logged in or not
        $this->isLoggedIn();
        $id=$this->uri->segment(3);
        $data['so_datails']=$this->Supplyingorder_Model->get_supplying_order($id);
        $data['supplyingorderList'] = $this->Supplyingorder_Model->get_item_by_supplyingorder($id);

         $data['user_records'] = $this->Web_model->get_user_datails();

        //get all data from the relevent tables
         $data['locationDbList'] = $locationDbList = $this->Location_Model->GetAll();
     
         $itemDbList = $this->Item_Model->getAllbysupplier();
        $supplierDbList = $this->Supplier_Model->GetAll();


        $locationSelectOptions[""] = "Select an location";//to pass a empty value

        foreach ($locationDbList as $key => $value) {
                $locationSelectOptions[$value->id] = $value->location;//to load values from database
            }
            
             $itemSelectOptions[""] = "Select an Item";//to pass a empty value


           foreach ($itemDbList as $key => $value) {
                $itemSelectOptions[$value->i_id] = $value->item;//to load values from database
            }

            $supplierSelectionOptions[""]="Select a Supplier";

            foreach ($supplierDbList as $key => $value) {
                $supplierSelectionOptions[$value->id] = $value->firstname;//to load values from database
            }

             //load data relevent list from defined dropdowns
            $data['locationList'] = $locationSelectOptions;
            $data['itemList'] = [];
        //    $data['buyingorderList'] = [];
            $data['supplierList'] = $supplierSelectionOptions;

            $this->layouts->view("Supplyingorder/edit",$data);
        }

    
        // Save buyingorder form data into DB
        public function updatesupplyingorder(){

             //check if the user is logged in or not
            $this->isLoggedIn();
            $soid= $this->input->post('soid');
            $id = $this->input->post('id');
            $supplierid = $this->input->post('supplierid');
            $fromd = $this->input->post('fromd');
            $tod = $this->input->post('tod');
            $loc = $this->input->post('loc');
            $s_bill_address = $this->input->post('s_bill_address');
            $gtotal  =$this->input->post('gtotal');
            
            $sordarr['supplier_id'] = $supplierid;
            $sordarr['date_from'] = $fromd;
            $sordarr['date_to'] = $tod;
            $sordarr['location_id'] = $loc;
            $sordarr['s_billing_address'] = $s_bill_address;
            $sordarr['so_grand_total'] = $gtotal;
            $this->Supplyingorder_Model->update_supplying_order($sordarr,$soid);

            $this->Supplyingorder_Model->delete_supplyingorder_item($soid);

            for($i=1;$i<=$id;$i++){
              if($this->input->post('catid'.$i)){  
                $catid = $this->input->post('catid'.$i);
                $qty = $this->input->post('qty'.$i);
                $buyprice = $this->input->post('buyprice'.$i);

                $soitems['supplyingorder_so_id'] = $soid;
                $soitems['item_i_id'] = $catid;
                $soitems['sitem_quantity'] = $qty;
                $soitems['so_balance_qty'] = $qty;
                $soitems['buying_price'] = $buyprice;

                $this->Supplyingorder_Model->add_so_items($soitems);
            }
            }
             //redirect to Supplyingorder page
            // Set success message as flash session

            if($soid){
               $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
           <h4><i class="icon fa fa-check"></i> Supplying order updated successfully!</h4></div>'); 
               redirect("Supplyingorder/index",'refresh');
           }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
           <h4><i class="icon fa fa-check"></i> Supplying order update Error!</h4></div>');
            redirect("Supplyingorder/index",'refresh');
           }
           
      
          }

       

 
    public function view()
    {
            //to check is user logged
        $this->isLoggedIn();

        $supplyingorderId = $this->uri->segment(3);

        if ($supplyingorderId != null) {

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

            $data['supplier'] = $this->Supplyingorder_Model->get_by_id($supplyingorderId);
            $data['supplyingorderList'] = $this->Supplyingorder_Model->get_item_by_supplyingorder($supplyingorderId);

            $this->layouts->view("Supplyingorder/view", $data);
        }

    }

    function Delete()
    {
        //check if the user is logged in or not
        $this->isLoggedIn();
        
        $userId = $this->uri->segment(3);
        $this->Supplyingorder_Model->delete_by_id($userId);

        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
            <h4><i class="icon fa fa-check"></i> Supplying order deleted successfully!</h4></div>');

        //redirect to Supplyingorder page
        redirect('Supplyingorder','refresh');
    }

    public function updateStatus(){
    $val_request=$this->input->post('request');
    $val_event=$this->input->post('event');
    $data['status']=$val_event;
    $result = $this->Supplyingorder_Model->update_by_id($val_request,$data);
    
}


  function get_supplier_items(){
    $sid = $this->input->post('supplier_id');
    $getitems = $this->Supplyingorder_Model->get_supplier_items($sid);
    echo json_encode($getitems);
  }


 

}
?>
