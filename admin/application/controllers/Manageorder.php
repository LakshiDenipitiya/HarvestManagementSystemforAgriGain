<?php
class Manageorder extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Manageorder_Model"); //load location model
    //      $this->load->model("Location_Model");
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

      //check has permissions
       if (!$this->permissions->has_permission('manageorderindex_list', $this->allowedPermissionCodes)) {
           $this->layouts->view("Nopermissions/index");
            return;
        }


      $this->layouts->view("Manageorder/index");
  }

//for dropdown select menu load by buyingsupplyingorder supplier buyer type 
 function selectordertype(){
    if($this->input->post('type')==1){
        redirect('Manageorder/buyingordermanage');
    }else{
        redirect('Manageorder/supplyingordermanage');
    }
 }


 function buyingordermanage(){
    $this->isLoggedIn();

//get all data from db
           $data['buyingorderList'] = $this->Manageorder_Model->getAllBuyingOrders();

      $this->layouts->view("Manageorder/buyingorderview",$data);
 }

 function supplyingordermanage(){
    $this->isLoggedIn();

//get all data from db
        $data['supplyingorderList'] = $this->Manageorder_Model->getAllSupplyingOrders();

      $this->layouts->view("Manageorder/supplyingorderview",$data);
 }


 function availablesupplyingorders(){
     $boid = $this->uri->segment(3);
     $data['buyingorderdata']=$buyingorderdata=$this->Manageorder_Model->getAllBuyingOrders_data($boid);
     $data['buyingorderitemdata'] = $boitemid =$this->Manageorder_Model->getAllBuyingOrders_dataitem($boid);
     
     $mainarray = array();
  
     $ins = "";
     foreach($boitemid as $items){  
       $ins .= ','.$items->item_i_id;     
     } 
     
    $str = ltrim($ins, ',');
   
    $data['availsupplyingorderarr'] = $this->Manageorder_Model->getavailableSupplyingOrders_data($str,$buyingorderdata->location_id,$buyingorderdata->date_from,$buyingorderdata->date_to);
  
      $this->layouts->view("Manageorder/availablesupplyingorderview",$data);
 }

  function availablebuyingorders(){
     $soid = $this->uri->segment(3);
     $data['supplyingorderdata']=$supplyingorderdata=$this->Manageorder_Model->getAllSupplyingOrders_data($soid);
     $data['supplyingorderitemdata'] = $soitemid =$this->Manageorder_Model->getAllSupplyingOrders_dataitem($soid);
     
     $mainarray2 = array();
 
     $ins = "";
     foreach($soitemid as $items){  
       $ins .= ','.$items->item_i_id;     
     } 
     
    $str = ltrim($ins, ',');
    
    $data['availbuyingorderarr'] = $this->Manageorder_Model->getavailableBuyingOrders_data($str,$supplyingorderdata->location_id,$supplyingorderdata->date_from,$supplyingorderdata->date_to);

      $this->layouts->view("Manageorder/availablebuyingorderview",$data);
 }

         function supplierconsent(){
            $boid = $this->uri->segment(3);
            $soid = $this->uri->segment(4);
            $boqty = $this->uri->segment(5);
            $buyerid = $this->uri->segment(6);
            $supplierid = $this->uri->segment(7);
            $soqty = $this->uri->segment(8);
            $itemid = $this->uri->segment(9);
            
            //get buying order item quantity
            $get_boitemqty = $this->Manageorder_Model->getboitemqty($boid,$itemid);
            // get buying oder item row count
            $boitemrowcount = $this->Manageorder_Model->getboitem_rows_count($boid);
            //get suppliying order item row count
            $soitemrowcount = $this->Manageorder_Model->getsoitem_rows_count($soid);
            
            //qunatity reducing and status change
            $bo_balance_qty=0;
            $bo_process_status = 0;
            if($get_boitemqty>$soqty){
                $bo_balance_qty = $get_boitemqty-$soqty;
                $bo_process_status = 0;
            }else{
                $bo_balance_qty=0; 
                $bo_process_status = 1;
            }

            $so_balance_qty=0;
            $so_process_status = 0;
            if($soqty>$get_boitemqty){
                $so_balance_qty = $soqty-$get_boitemqty;
                $so_process_status = 0;
            }else{
                $so_balance_qty=0; 
                $so_process_status = 1;
            }


            // bo items table update..
            $updateboitmearr['bo_balance_qty']= $bo_balance_qty;
            $updateboitmearr['boi_status']= $bo_process_status;
            $this->Manageorder_Model->update_boitemtbl($updateboitmearr,$boid,$itemid); 


            $updatesoitmearr['so_balance_qty']= $so_balance_qty;
            $updatesoitmearr['soi_status']= $so_process_status;
            $this->Manageorder_Model->update_soitemtbl($updatesoitmearr,$soid,$itemid); 
            
            // check and update buying order complete
            $this->Manageorder_Model->check_bo_complete($boid,$boitemrowcount); 
            $this->Manageorder_Model->check_so_complete($soid,$soitemrowcount);

            //set quantity to new quantity
            $qty = 0;
            if($get_boitemqty>$soqty){
                $qty = $soqty;
            }else{
                $qty = $get_boitemqty;
            }

            

            // add to buying suppling order table
            $insertbo_soarray['createddate'] = date("Y-m-d");
            $insertbo_soarray['status'] = 2;
            $insertbo_soarray['buyer_id'] = $buyerid;
            $insertbo_soarray['supplier_id'] = $supplierid;
            $insertbo_soarray['bs_quanitiy'] = $qty;  
            $insertbo_soarray['buyerorder_boi_id '] = $boid;
            $insertbo_soarray['supplierorder_soi_id '] = $soid;
            $insertbo_soarray['item_id '] = $itemid;
            $insertbo_soarray['bo_so_type'] = 1;

             $this->Manageorder_Model->add_bo_so_order($insertbo_soarray);


        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
            <h4><i class="icon fa fa-check"></i> Consent added successfully!</h4></div>');

            redirect('Manageorder/availablesupplyingorders/'.$boid);
         }

            function create_advance_payment(){
            $data['done_bo'] = $this->Manageorder_Model->get_done_bo();

            $this->layouts->view("Manageorder/index_assign_bo_so",$data);
         }

          

          function buyerconsent(){
            $soid = $this->uri->segment(3);
            $boid = $this->uri->segment(4);
            $boqty = $this->uri->segment(5);
            $supplierid = $this->uri->segment(6);
            $buyerid = $this->uri->segment(7);
            $boqty = $this->uri->segment(8);
            $itemid = $this->uri->segment(9);
            
 
            $get_soitemqty = $this->Manageorder_Model->getsoitemqty($soid,$itemid);
            $boitemrowcount = $this->Manageorder_Model->getboitem_rows_count($boid);
            $soitemrowcount = $this->Manageorder_Model->getsoitem_rows_count($soid);
            
           
            $so_balance_qty=0;
            $so_process_status = 0;
            if($get_soitemqty>$boqty){
                $so_balance_qty = $get_soitemqty-$boqty;
                $so_process_status = 0;
            }else{
                $so_balance_qty=0; 
                $so_process_status = 1;
            }

            $bo_balance_qty=0;
            $bo_process_status = 0;
            if($boqty>$get_soitemqty){
                $bo_balance_qty = $boqty-$get_soitemqty;
                $bo_process_status = 0;
            }else{
                $bo_balance_qty=0; 
                $bo_process_status = 1;
            }


            // bo items table update..
            $updateboitmearr['bo_balance_qty']= $bo_balance_qty;
            $updateboitmearr['boi_status']= $bo_process_status;
            $this->Manageorder_Model->update_boitemtbl($updateboitmearr,$boid,$itemid); 


            $updatesoitmearr['so_balance_qty']= $so_balance_qty;
            $updatesoitmearr['soi_status']= $so_process_status;
            $this->Manageorder_Model->update_soitemtbl($updatesoitmearr,$soid,$itemid); 
            
            // check and update buying order complete..
            $this->Manageorder_Model->check_bo_complete($boid,$boitemrowcount); 
            $this->Manageorder_Model->check_so_complete($soid,$soitemrowcount);
          
                $qty = 0;
            if($get_soitemqty>$boqty){
                $qty = $boqty;
            }else{
                $qty = $get_soitemqty;
            }  

            // add to buying suppling order table
            $insertbo_soarray['createddate'] = date("Y-m-d");
            $insertbo_soarray['status'] = 1;
            $insertbo_soarray['buyer_id'] = $buyerid;
            $insertbo_soarray['supplier_id'] = $supplierid;
            $insertbo_soarray['bs_quanitiy'] = $get_soitemqty;  
            $insertbo_soarray['buyerorder_boi_id '] = $boid;
            $insertbo_soarray['supplierorder_soi_id '] = $soid;
            $insertbo_soarray['item_id '] = $itemid;
            $insertbo_soarray['bo_so_type'] = 2;

             $this->Manageorder_Model->add_so_bo_order($insertbo_soarray);

              // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
            <h4><i class="icon fa fa-check"></i> Consent added successfully!</h4></div>');


            redirect('Manageorder/availablebuyingorders/'.$soid);
         }

  


}
?>
