
<script type="text/javascript">
$(document).ready(function () {
    $('#buyingorder').DataTable();
});

/*function onStatusChange (requestId, event) {
$.post( "Buyingorder/updateStatus",{request:requestId, event:event.target.value});
}*/
</script>



<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ready to purchase
        <small>List</small> 
    </h1>

</script>


</section>

<!-- Main content -->
<section class="content">
    <!-- Display success Message -->
    <?php if ($this->session->flashdata("message")) { ?>

    <p class="success">
        <?php echo $this->session->flashdata("message"); ?>
    </p>

    <?php } ?>


    <div class="box">
        
        <div class="box-body">
           <div class="table table-responsive">

                 <?php echo form_open("Manageorderstatus/selectordertype")?>
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
                        </div>



                <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Buying Order No</th>
                            <th>Buyer Name</th> 
                          <!--  <th>Grand Total (Rs.)</th>-->
                            <th>Buying Date from Supplier</th>
                            <th>Distpatch Date to Buyer</th>
                            <th>Assigned Agriofficer</th>
                          <!--   <th>Assigned Vehicle</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($readytopurchase_bo_so){
                        foreach ($readytopurchase_bo_so as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                            <td><?php echo $buyingorder->bfname.'&nbsp;'.$buyingorder->blname; ?></td>
                          <!--  <td><?php echo $buyingorder->bo_grand_total; ?></td>-->
                            <td><?php echo $buyingorder->b_app_date; ?></td>
                            <td><?php echo $buyingorder->s_app_date; ?></td>
                            <td><?php echo $buyingorder->fname." ".$buyingorder->lname; ?></td>
                        <!--    <td><?php echo $buyingorder->vehicle_id; ?></td> -->
                            <td>
                                            <?php echo anchor("Manageorderstatus/ready_to_purchased_view_grn_bo_so/" . $buyingorder->bo_id."/".$buyingorder->location_id, '<span class="fa fa-edit"> View GRN</span>', (array('class' => 'btn btn-xs btn-success '))) ?> 
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







