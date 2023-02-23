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
            <h3 class="box-title">Ready to distpatch</h3>
             
             </div>
           <div class="table table-responsive">

                  <!--  <?php echo form_open("Manageorderstatus/selectordertype")?>
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
                            <option value="2">Buyer agreed - Ready to Advance Payment</option> 
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



                <table class="table table-bordered table-striped table-hover" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>No</th>
                            <th>Buyer Name</th> 
                            <th>Grand Total</th>
                            <th>Date From</th>
                            <th>Date To</th> 
                            <th>Distpatch Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($readytodistpatch_bo_so){
                        foreach ($readytodistpatch_bo_so as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                            <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td>
                            <td><?php echo $buyingorder->bo_grand_total; ?></td>
                            <td><?php echo $buyingorder->date_from; ?></td>
                            <td><?php echo $buyingorder->date_to; ?></td>
                              <td><?php echo $buyingorder->s_app_date; ?></td>
                            <td>
                                            <?php echo anchor("Manageorderstatus/generate_due_payment_invoice/" . $buyingorder->bo_id."/".$buyingorder->location_id, '<span class="fa fa-edit"> Generate Invoice</span>', (array('class' => 'btn btn-xs btn-success '))) ?> 
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







