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
            <h3 class="box-title"><a href="<?php echo base_url() ?>/Manageorderstatus/index_all_fullview/">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a>Generate GRN</h3>
             
             </div>
    
           <div class="table table-responsive">

                 <!--  <?php echo form_open("Manageorderstatus/selectordertype_so_bo")?>
                        <div class="table table-responsive">
                           <select name="type" required="required">
                            <option value="">Select Status Type</option>
                            <?php
                            if($this->session->userdata('designation_id')=="3"){
                            ?>
                            <option value="7">All</option>
                            
                            <option value="4">Ready to purchase</option>
                            <option value="5">Ready to distpatch</option>
                            <?php
                            }else{
                            ?>
                            <option value="7">All</option>
                            <option value="1">Supplier agreed - Ready to Advance Payment</option> 
                            <option value="3">Advance Payment - Assign Agri Officer</option>
                            <option value="4">Ready to purchase</option>
                            <option value="5">Ready to distpatch</option>
                            <?php
                            
                            }
                            ?>
                            
                            
                           </select>
                           <button type="submit" name="select_type"> 
                            Select
                           </button>
                        <?php echo form_close()?>
                        </div>-->


                <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
                    <thead>
                        <tr>
                  
                        	<th>Buying Order No</th>
                            <th>Supplying Order No</th>
                            <th>Supplier Name</th>
                            <th>Item</th> 
                            <th>Sub Total</th>
                            <th>Purchase Date</th> 
                            <th>Action</th>
       `                 </tr>
                    </thead>
                    <tbody>

                        <?php if($get_borelate_so){
                        foreach ($get_borelate_so as $key => $buyingorder) { ?>
                        <tr>
                 
                            <td><?php echo $buyingorder->buyerorder_boi_id; ?></td>
                            <td><?php echo $buyingorder->supplierorder_soi_id; ?></td>
                            <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td>
                            <td><?php echo $buyingorder->item; ?></td>
                            <td><?php echo $buyingorder->buyingprice*$buyingorder->sitem_quantity; ?></td>
                            <td><?php echo $buyingorder->b_app_date; ?></td>
                     
                            <td>
                                            <?php echo anchor("Manageorderstatus/process_grn_bo_so/" . $buyingorder->buyerorder_boi_id."/".$buyingorder->bs_id, '<span class="fa fa-edit"> View GRN</span>', (array('class' => 'btn btn-xs btn-success '))) ?> 
                             </td>
                            
                                    </tr>

                                    <!-- <li><?php echo $key . " : " . $supplier->name; ?></li> -->
                                    <?php } } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->







