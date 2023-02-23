<!-- Content Header (Page header) -->
<section class="content-header">
    <style>
.required:after {
    content:" *";
    position: relative;
    top: 0;
    right: -1px;
    color: red;
}

 .content{
    background-image: url("<?php echo base_url('assertsN/images/cr4.jpg');?>");
    height: 100%;
    width: 100%;
    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 }

 .innercontent{
       /* Full height */
  width: 90%;
  padding-left: 10%;
    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 }

 .box-header{
    background-color: whitesmoke;

 }
</style>
</script>


</section>

<!-- Main content -->
<section class="content">
    <div class="innercontent">

    <!-- Display success Message -->
    <?php if ($this->session->flashdata("message")) { ?>

    <p class="success">
        <?php echo $this->session->flashdata("message"); ?>
    </p>

    <?php } ?>



<div class="box">
    
            
        <div class="box-body">
             <div class="box-header with-border">
            <h3 class="box-title">Order Status</h3>
             
             </div>
           <div class="table table-responsive">


                <table class="table table-bordered table-striped table-hover" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Order No</th>
                         <!--   <th>Buyer Name</th> -->
                           <!-- <th>Grand Total</th>-->
                            <th>Date From</th>
                            <th>Date To</th> 
                            <th>Status</th>
                            <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if($all_bo_so){
                            foreach ($all_bo_so as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                          <!--  <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td> -->
                         <!--   <td><?php echo $buyingorder->bo_grand_total; ?></td>-->
                            <td><?php echo $buyingorder->date_from; ?></td>
                            <td><?php echo $buyingorder->date_to; ?></td>
                            <td>  <?php if($buyingorder->bs_stts==1){
                                    echo "Supplier agreed - Ready to Advance Payment";
                                }else if($buyingorder->bs_stts==2){
                                    echo "Buyer agreed - Ready to Advance Payment";
                                }else if($buyingorder->bs_stts==3){
                                    echo "Advance to be Paid";
                                }else if($buyingorder->bs_stts==4){
                                    echo "Ready to purchase";
                                }else if($buyingorder->bs_stts==5){
                                    echo "Ready to Distpatch";
                                }else if($buyingorder->bs_stts==6){
                                    echo "Completed";
                                }
                                ?></td>
                                                    <td>
                                        
                                                  <?php if($this->session->userdata('type')=="buyer"){
                                                           if($buyingorder->bo_so_type==1){
                                                                echo anchor("Manageorderstatus/viewbuyingorderstatus/" . $buyingorder->bo_id, '<span class="fa fa-eye"> View</span>', (array('class' => 'btn btn-xs btn-info '))); 

                                                           }else if($buyingorder->bo_so_type==2){
                                                                echo anchor("Manageorderstatus/viewsupplyigorderstatus/" . $buyingorder->supplierorder_soi_id, '<span class="fa fa-eye"> View</span>', (array('class' => 'btn btn-xs btn-info '))); 
                                                                                                     
                                                }
                                                 } 
                                                ?>



                                               <?php if($this->session->userdata('type')=="buyer"){
                                                           if($buyingorder->bs_stts==5 && $buyingorder->bo_so_type==1){
                                                                echo anchor("Manageorderstatus/generate_due_payment_invoice/" . $buyingorder->bo_id, '<span class="fa fa-edit"> View Due Payment</span>', (array('class' => 'btn btn-xs btn-success ')));
                                                                }else if($buyingorder->bs_stts==5 && $buyingorder->bo_so_type==2){
                                                                     echo anchor("Manageorderstatus/generate_due_payment_so_invoice/" . $buyingorder->supplierorder_soi_id. "/". $buyingorder->bs_id, '<span class="fa fa-edit"> View Due Payment</span>', (array('class' => 'btn btn-xs btn-success ')));      
                                                                }else{
                                                            if($buyingorder->bs_stts==2){
                                                                echo anchor("Manageorderstatus/create_advance_payment/" . $buyingorder->bo_id, '<span class="fa fa-edit"> Proceed</span>', (array('class' => 'btn btn-xs btn-success ')));
                                                            }else if($buyingorder->bs_stts==1){
                                                                echo anchor("Manageorderstatus/create_so_advance_payment/" . $buyingorder->bo_id, '<span class="fa fa-edit"> Proceed</span>', (array('class' => 'btn btn-xs btn-success ')));
                                                            }
                                                
                                                    }
                                                }
                                                  
                                                ?>
                                          
                                        </td>
                                    </tr>

                                    
                                    <?php 
                                     } 
                        }else{
                            foreach ($all_so_bo as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->so_id; ?></td>
                          <!--  <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td> -->
                           <!-- <td><?php echo $buyingorder->so_grand_total; ?></td>-->
                            <td><?php echo $buyingorder->date_from; ?></td>
                            <td><?php echo $buyingorder->date_to; ?></td>
                            <td>  <?php if($buyingorder->bs_stts==1){
                                    echo "Supplier agreed - Ready to Advance Payment";
                                }else if($buyingorder->bs_stts==2){
                                    echo "Buyer agreed - Ready to Advance Payment";
                                }else if($buyingorder->bs_stts==3){
                                    echo "Advance to be Paid";
                                }else if($buyingorder->bs_stts==4){
                                    echo "Ready to purchase";
                                }else if($buyingorder->bs_stts==5){
                                    echo "Ready to Distpatch";
                                }else if($buyingorder->bs_stts==6){
                                    echo "Completed";
                                }
                                ?></td>
                                                    <td>
                                          
                                                       <?php if($this->session->userdata('type')=="supplier"){
                                                           if($buyingorder->bo_so_type==1){
                                                                echo anchor("Manageorderstatus/viewbuyingorderstatus/" . $buyingorder->buyerorder_boi_id, '<span class="fa fa-eye"> View</span>', (array('class' => 'btn btn-xs btn-info '))); 

                                                           }else if($buyingorder->bo_so_type==2){
                                                                echo anchor("Manageorderstatus/viewsupplyigorderstatus/" . $buyingorder->so_id, '<span class="fa fa-eye"> View</span>', (array('class' => 'btn btn-xs btn-info '))); 
                                                                                                     
                                                }
                                                 } 
                                                ?>



                                               <?php if($this->session->userdata('type')=="supplier"){
                                                           if($buyingorder->bs_stts==4 && $buyingorder->bo_so_type==1){
                                                                echo anchor("Manageorderstatus/ready_to_purchased_view_grn_bo_so/" . $buyingorder->buyerorder_boi_id. "/". $buyingorder->bs_id, '<span class="fa fa-edit"> View GRN</span>', (array('class' => 'btn btn-xs btn-success ')));

                                                           }else if($buyingorder->bs_stts==4 && $buyingorder->bo_so_type==2){
                                                                echo anchor("Manageorderstatus/process_grn_so_bo/" . $buyingorder->so_id. "/". $buyingorder->bs_id, '<span class="fa fa-edit"> View GRN</span>', (array('class' => 'btn btn-xs btn-success ')));
                                                                                                     
                                                }
                                                 } 
                                                ?>
                                          
                                        </td>
                                    </tr>

                                    
                                    <?php 
                                     } 
                        }
                        


                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

       





            </div>
            </section>
            <!-- /.content -->







