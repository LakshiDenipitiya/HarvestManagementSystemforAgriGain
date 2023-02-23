<?php
class Manageorderstatus extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Manageorderstatus_Model"); //load location model
    //      $this->load->model("Location_Model");
        $this->isLoggedIn();
    }

    private function isLoggedIn(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect("Login");
        }
    }

    //status option for so_bo
    function selectordertype(){

     if($this->session->userdata('designation_id')=="3"){
        if($this->input->post('type')==7){
            redirect('Manageorderstatus/index_fullview');
        }else if($this->input->post('type')==4){
            redirect('Manageorderstatus/ready_to_purchased_bo_so');
        }else if ($this->input->post('type')==5){
            redirect('Manageorderstatus/bo_so_order_readytodistpatch');
        }
     }else{
        if($this->input->post('type')==7){
            redirect('Manageorderstatus/index_fullview');
        }else if($this->input->post('type')==2){
            redirect('Manageorderstatus/create_advance_payment');
        }else if($this->input->post('type')==3){
            redirect('Manageorderstatus/bo_so_advance_paid');
        }else if($this->input->post('type')==4){
            redirect('Manageorderstatus/ready_to_purchased_bo_so');
        }else if ($this->input->post('type')==5){
            redirect('Manageorderstatus/bo_so_order_readytodistpatch');
        }
     }

        
    }

//------------------------available supply order for buying order ----------------------------
 
  //supplier_agreed status view controller

        function create_advance_payment(){

         /*   if($this->session->userdata('designation_id')=="1"){     
                  $data['done_bo'] = $this->Manageorderstatus_Model->get_done_bo();
                 }else{
             $data['done_bo'] = $this->Manageorderstatus_Model->get_both_agreed_bo();}*/
             
              $data['done_bo'] = $this->Manageorderstatus_Model->get_both_agreed_bo();
     
            $this->layouts->view("Manageorderstatus/index_assign_bo_so",$data);
         }


        function viewconsentedorder(){
             //to check is user logged
              $this->isLoggedIn();

                 $boid = $this->uri->segment(3);

                 if ($boid != null) {

            $data['bo_details']  = $this->Manageorderstatus_Model->get_bo($boid);
            $data['bo_so_details'] = $this->Manageorderstatus_Model->get_bo_so_details($boid);

            $this->layouts->view("Manageorderstatus/view_index_assign_bo_so", $data);
         }}

  //--------------------------Advance to be paid buying orders -------------------------------

         function generate_advance_invoice(){
            $boid = $this->uri->segment(3);
            
            $data['bo_details']  = $bo_details = $this->Manageorderstatus_Model->get_bo($boid);
            $data['bo_so_details'] = $bo_so_details = $this->Manageorderstatus_Model->get_bo_so_details($boid);
            
            // update for status chage  =3
            foreach($bo_so_details as $rec){
                $bs_id=$rec->bs_id;
                $updatearr['status'] = 3;
                $this->Manageorderstatus_Model->update_bo_so_order_status($bs_id,$updatearr);
            }
               

            $this->load->view('Invoices/buyingorderadvance_view',$data);
         }

//---------------------------------advance paid buying orders ----------------------
         //bo_so advance paid 

         function bo_so_advance_paid(){
            $data['advpaid_bo'] = $this->Manageorderstatus_Model->get_advpaid_bo();

            $this->layouts->view("Manageorderstatus/index_advance_paid_bo_so",$data);
         }

         function advance_paid_emp_assign(){
              $boid = $this->uri->segment(3);
              $data['boid'] = $boid;
              $locationid = $this->uri->segment(4);
              $employeeList = $this->Manageorderstatus_Model->get_agriofficers($locationid);
              $vehicleList = $this->Manageorderstatus_Model->get_vehicles($locationid);


                $employeeSelectOptions[""] = "Select an Agriculture Officer";//to pass a empty value

                foreach ($employeeList as $key => $value) {
                        $employeeSelectOptions[$value->id] = $value->firstname.' '.$value->lastname;//to load values from database
                    }

                    $vehicleSelectionOptions[""]="Select a Vehicle";

                    foreach ($vehicleList as $key => $value) {
                        $vehicleSelectionOptions[$value->v_id] = $value->vehicleno;//to load values from database
                    }

                     //load data relevent list from defined dropdowns
                    $data['employeeList'] = $employeeSelectOptions;
                    $data['vehicleList'] = $vehicleSelectionOptions;

                $this->layouts->view("Manageorderstatus/assign_agriofficer_bo_so",$data);
         }


         function check_dates(){
            $dt = $this->input->post('chkdate');
            $boid  = $this->input->post('boid');
            $stts = $this->Manageorderstatus_Model->check_date_valid($dt,$boid);
            echo json_encode($stts);
         }

         function save(){
            $boid = $this->input->post('boid');
            $emp_id = $this->input->post('employee_id');
            $vehicle_id = $this->input->post('vehicle_id');
            $purchase_date = $this->input->post('purchase_date');
            $dispatch_date = $this->input->post('dispatch_date');

            $arr['employee_id']  = $emp_id;
            $arr['b_app_date']  = $purchase_date;
            $arr['s_app_date']  = $dispatch_date;
            $arr['vehicle_v_id']  = $vehicle_id;
            $arr['status']  = 4;
            $savestts  = $this->Manageorderstatus_Model->save_assignedagriofficer($arr,$boid);


        // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Advance Paid! - Agriculture officer assigned</h4></div>');

            redirect('Manageorderstatus/ready_to_purchased_bo_so');
         }

//------------------------------- ready to purchased bo-so----------------------

         //ready to purchased bo_so

         function ready_to_purchased_bo_so(){
             $data['readytopurchase_bo_so'] = $this->Manageorderstatus_Model->get_readytopurchase_bo_so();

            $this->layouts->view("Manageorderstatus/index_purchase_distpatch_bo_so",$data);
         }

         function ready_to_purchased_view_grn_bo_so(){
              $boid = $this->uri->segment(3);
             $data['get_borelate_so'] = $this->Manageorderstatus_Model->get_bo_related_so($boid);
          
            $this->layouts->view("Manageorderstatus/view_purchase_distpatch_bo_so",$data);
         }

         function process_grn_bo_so(){
            $boid = $this->uri->segment(3);
            $boso_id = $this->uri->segment(4);
            // get buying suppliyorder bo related data

            $boso_data=$this->Manageorderstatus_Model->get_bo_so_data($boso_id);
            //loop

            
              // get grnno
              $grnno=$this->Manageorderstatus_Model->get_last_grnno();
              // updategrn ..
              //$updategrn['grn'] = $grnno;
             // $updategrn['status'] = 5;
            //  $this->Manageorderstatus_Model->update_bo_so_orders_grn_tbl($updategrn,$boso_id);
              
              $data['bo_details'] = $this->Manageorderstatus_Model->get_bo_forgrn($boid);
              $data['so_details'] = $this->Manageorderstatus_Model->get_bo_so_details_forgrn($boid,$boso_data->supplierorder_soi_id,$boso_data->item_id);

            $this->load->view("Invoices/buyingordergrn_view",$data);


         }

//-----------------------------ready to distpatch bo-so----------------------------------

         // bo_so order complete

         function bo_so_order_readytodistpatch(){
            $data['readytodistpatch_bo_so'] = $this->Manageorderstatus_Model->get_readytodistpatch_bo_so();

              $this->layouts->view("Manageorderstatus/index_completed_bo_so",$data);
         }


           function generate_due_payment_invoice(){
            $boid = $this->uri->segment(3);
            
            $data['bo_details']  = $bo_details = $this->Manageorderstatus_Model->get_bo($boid);
            $data['bo_so_details'] = $bo_so_details = $this->Manageorderstatus_Model->get_bo_so_details_readytodistpatch($boid);

            $status = $this->Manageorderstatus_Model->get_current_status($boid);
            
            if($status!=5){
                  // Set success message as flash session
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> You cannot create due payment invoice. Please make advance payment!</h4></div>');
                redirect("Manageorderstatus/index_all_fullview");
            }

            $this->load->view('Invoices/buyingorderduepayment_view',$data);
         }
         

         //full view bo_so

         function index_fullview(){
             $data['all_bo_so'] = $this->Manageorderstatus_Model->get_all_bo_so();

             $this->layouts->view("Manageorderstatus/index_fullview_bo_so",$data);
         }


    







//-------------------------------------------------------------------------------------------

   //status option for bo_so
      function selectordertype_so_bo(){

     if($this->session->userdata('designation_id')=="3"){
        if($this->input->post('type')==7){
            redirect('Manageorderstatus/index_so_fullview');
        }else if($this->input->post('type')==4){
            redirect('Manageorderstatus/ready_to_purchased_so_bo');
        }else if ($this->input->post('type')==5){
            redirect('Manageorderstatus/so_bo_order_readytodistpatch');
        }
     }else{
        if($this->input->post('type')==7){
            redirect('Manageorderstatus/index_so_fullview');
        }else if($this->input->post('type')==1){
            redirect('Manageorderstatus/create_so_advance_payment');
        }else if($this->input->post('type')==3){
            redirect('Manageorderstatus/so_bo_advance_paid');
        }else if($this->input->post('type')==4){
            redirect('Manageorderstatus/ready_to_purchased_so_bo');
        }else if ($this->input->post('type')==5){
            redirect('Manageorderstatus/so_bo_order_readytodistpatch');
        }
     }

        
    }

   //buyer_agreed status view controller

              function create_so_advance_payment(){
                $id=$this->uri->segment(3);
            $data['done_so'] = $this->Manageorderstatus_Model->get_both_agreed_so($id);

            $this->layouts->view("Manageorderstatus/index_assign_so_bo",$data);
         }

//advance payment so_bo
          function generate_so_advance_invoice_view(){
              $soid = $this->uri->segment(3);
             $data['get_advsorelate_bo'] = $this->Manageorderstatus_Model->get_so_advance_invoice_related_bo($soid);
          
            $this->layouts->view("Manageorderstatus/vieworder_index_assign_so_bo",$data);
         }

         function generate_so_advance_invoice(){
            $soid = $this->uri->segment(3);
            $data['so_details']  = $so_details = $this->Manageorderstatus_Model->get_so($soid);
            $data['so_bo_details'] = $so_bo_details = $this->Manageorderstatus_Model->get_so_bo_details($soid);
         
                 // update for status chage  =3
            foreach($so_bo_details as $rec){
                $bs_id=$rec->bs_id;
                $updatearr['status'] = 3;
                $this->Manageorderstatus_Model->update_so_bo_order_status($bs_id,$updatearr);
            }
               

           $this->load->view('Invoices/supplyingorderadvance_view',$data);
         }

           function viewsoconsentedorder(){
             //to check is user logged
              $this->isLoggedIn();

                 $soid = $this->uri->segment(3);

                 if ($soid != null) {

            $data['so_details']  = $this->Manageorderstatus_Model->get_so($soid);
            $data['bo_so_details'] = $this->Manageorderstatus_Model->get_so_bo_details($soid);

            $this->layouts->view("Manageorderstatus/view_index_assign_so_bo", $data);
         }
     }


     // ready to purchased so_bo

     function ready_to_purchased_so_bo(){
             $data['readytopurchase_so_bo'] = $this->Manageorderstatus_Model->get_readytopurchase_so_bo();

            $this->layouts->view("Manageorderstatus/index_purchase_distpatch_so_bo",$data);
         }


     /*   function ready_to_purchased_view_grn_so_bo(){
              $soid = $this->uri->segment(3);
             $data['get_sorelate_bo'] = $this->Manageorderstatus_Model->get_so_related_bo($soid);
          
            $this->layouts->view("Manageorderstatus/view_purchase_distpatch_so_bo",$data);
         }*/

 //so_bo advance paid 

         function so_bo_advance_paid(){
            $data['advpaid_so'] = $this->Manageorderstatus_Model->get_advpaid_so();

            $this->layouts->view("Manageorderstatus/index_advance_paid_so_bo",$data);
         }

         function advance_so_paid_emp_assign(){
              $soid = $this->uri->segment(3);
              $data['soid'] = $soid;
              $locationid = $this->uri->segment(4);
              $employeeList = $this->Manageorderstatus_Model->get_so_agriofficers($locationid);
              $vehicleList = $this->Manageorderstatus_Model->get_so_vehicles($locationid);


                $employeeSelectOptions[""] = "Select an Agriculture Officer";//to pass a empty value

                foreach ($employeeList as $key => $value) {
                        $employeeSelectOptions[$value->id] = $value->firstname.' '.$value->lastname;//to load values from database
                    }

                    $vehicleSelectionOptions[""]="Select a Vehicle";

                    foreach ($vehicleList as $key => $value) {
                        $vehicleSelectionOptions[$value->v_id] = $value->vehicleno;//to load values from database
                    }

                     //load data relevent list from defined dropdowns
                    $data['employeeList'] = $employeeSelectOptions;
                    $data['vehicleList'] = $vehicleSelectionOptions;

                $this->layouts->view("Manageorderstatus/assign_agriofficer_so_bo",$data);
         }


         function check_so_dates(){
            $dt = $this->input->post('chkdate');
            $soid  = $this->input->post('soid');
            $stts = $this->Manageorderstatus_Model->check_so_date_valid($dt,$boid);
            echo json_encode($stts);
         }

           function so_save(){
            $soid = $this->input->post('soid');
            $emp_id = $this->input->post('employee_id');
            $vehicle_id = $this->input->post('vehicle_id');
            $purchase_date = $this->input->post('purchase_date');
            $dispatch_date = $this->input->post('dispatch_date');

            $arr['employee_id']  = $emp_id;
            $arr['b_app_date']  = $purchase_date;
            $arr['s_app_date']  = $dispatch_date;
            $arr['status']  = 4;
            $savestts  = $this->Manageorderstatus_Model->save_so_assignedagriofficer($arr,$soid);

             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Advance Paid! - Agriculture officer assigned</h4></div>');
            redirect('Manageorderstatus/ready_to_purchased_so_bo');
         }

//GRN creation

           function process_grn_so_bo(){
            $soid = $this->uri->segment(3);
            $sobo_id = $this->uri->segment(4);
            // get buying suppliyorder bo related data

            $sobo_data=$this->Manageorderstatus_Model->get_so_bo_data($sobo_id);
            //loop

            
              // get grnno
              $grnno=$this->Manageorderstatus_Model->get_last_grnno();
              // updategrn ..
              $updategrn['grn'] = $grnno;
              $updategrn['status'] = 5;
           //   $this->Manageorderstatus_Model->update_bo_so_orders_grn_tbl($updategrn,$sobo_id);
              
              $data['so_details'] = $this->Manageorderstatus_Model->get_so_forgrn($soid);
              $data['bo_details'] = $this->Manageorderstatus_Model->get_so_bo_details_forgrn($sobo_data->supplierorder_soi_id,$sobo_data->buyerorder_boi_id,$sobo_data->item_id);

            //echo $sobo_data->supplierorder_soi_id."/".$sobo_data->buyerorder_boi_id."/".$sobo_data->item_id;
              //print_r($data['bo_details']);

            $this->load->view("Invoices/supplyingordergrn_view",$data);


         }

//due payment

            function so_bo_order_readytodistpatch(){
            $data['readytodistpatch_so_bo'] = $this->Manageorderstatus_Model->get_readytodistpatch_so_bofinal();

              $this->layouts->view("Manageorderstatus/index_completed_so_bo",$data);
         }

          function generate_so_duepayment_invoice_list(){
              $soid = $this->uri->segment(3);
             $data['get_advsorelate_bo'] = $this->Manageorderstatus_Model->get_so_duepayment_invoice_related_bo($soid);
          
            $this->layouts->view("Manageorderstatus/vieworder_completed_so_bo",$data);
         }


           function generate_due_payment_so_invoice(){
            $soid = $this->uri->segment(3);
            $recordid=$this->uri->segment(4);
            
              $sobo_data=$this->Manageorderstatus_Model->get_so_bo_data($recordid);

            $data['so_details'] = $this->Manageorderstatus_Model->get_so_forgrn($soid);
              $data['bo_details'] = $this->Manageorderstatus_Model->get_so_bo_details_forgrn($sobo_data->supplierorder_soi_id,$sobo_data->buyerorder_boi_id,$sobo_data->item_id);
            
            // update for status chage  =3
            
                $bs_id=$recordid;
                $updatearr['status'] = 6;
             //   $this->Manageorderstatus_Model->update_so_bo_order_status($bs_id,$updatearr);
            
               

            $this->load->view('Invoices/supplyingorderduepayment_view',$data);
         }
         

         //full view so_bo

         function index_so_fullview(){
             $data['all_so_bo'] = $this->Manageorderstatus_Model->get_all_so_bo();

             $this->layouts->view("Manageorderstatus/index_fullview_so_bo",$data);
         }


         function viewsupplyigorderstatus(){
             //to check is user logged
              $this->isLoggedIn();

                 $soid = $this->uri->segment(3);

                 if ($soid != null) {

            $data['bo_details']  = $this->Manageorderstatus_Model->get_so($soid);
            $data['bo_so_details'] = $this->Manageorderstatus_Model->get_full_so_bo_details($soid);
       //  print_r($data);
          $this->layouts->view("Manageorderstatus/view_index_fullview_so_bo", $data);
         }
     }

       function viewbuyingorderstatus(){
             //to check is user logged
              $this->isLoggedIn();

                 $boid = $this->uri->segment(3);

                 if ($boid != null) {

            $data['bo_details']  = $this->Manageorderstatus_Model->get_bo($boid);
            $data['bo_so_details'] = $this->Manageorderstatus_Model->get_full_bo_so_details($boid);
          // print_r($data);
            $this->layouts->view("Manageorderstatus/view_index_fullview_bo_so", $data);
         }
     }


      function index_all_fullview(){
          if($this->session->userdata('type')=="buyer"){
                $data['all_bo_so'] = $this->Manageorderstatus_Model->get_all_bo_so2();
                 $data['all_so_bo'] =[];
             //    print_r($data['all_bo_so']);
          }else{
                $data['all_so_bo'] = $this->Manageorderstatus_Model->get_all_so_bo2();
                 $data['all_bo_so'] =[];
          }
             
              $this->layouts->view("Manageorderstatus/index_all_fullview",$data);
         }

         function order_history(){
            if($this->session->userdata('type')=="buyer"){
                $data['all_bo_so'] = $this->Manageorderstatus_Model->get_all_bo_so_final();
                 $data['all_so_bo'] =[];
          }else{
                $data['all_so_bo'] = $this->Manageorderstatus_Model->get_all_so_bo_final();
                $data['all_bo_so'] =[];
          }
                   $this->layouts->view("Manageorderstatus/order_history",$data);      
         }




}
?>
