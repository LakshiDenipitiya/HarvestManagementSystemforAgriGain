
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
        Generate GRNs
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
                            <td><?php echo $buyingorder->buyingprice*$buyingorder->bs_quanitiy; ?></td>
                            <td><?php echo $buyingorder->b_app_date; ?></td>
                     
                            <td>
                                            <?php echo anchor("Manageorderstatus/process_grn_bo_so/" . $buyingorder->buyerorder_boi_id."/".$buyingorder->bs_id, '<span class="fa fa-edit"> Generate GRN</span>', (array('class' => 'btn btn-xs btn-success '))) ?> 
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







