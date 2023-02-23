
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
        Generate Due payment invoices
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

                     <?php echo form_open("Manageorderstatus/selectordertype_so_bo")?>
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
                        </div>


                <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
                    <thead>
                        <tr>
                  
                        	<th>Supplying Order No</th>
                            <th>Buying Order No</th>
                            <th>Buyer Name</th>
                            <th>Item</th> 
                            <th>Sub Total</th>
                            <th>Distpatch Date</th> 
                            <th>Action</th>
       `                 </tr>
                    </thead>
                    <tbody>

                        <?php if($get_advsorelate_bo){
                        foreach ($get_advsorelate_bo as $key => $supplyingorder) { ?>
                        <tr>
                 
                            <td><?php echo $supplyingorder->supplierorder_soi_id; ?></td>
                            <td><?php echo $supplyingorder->buyerorder_boi_id; ?></td>
                            <td><?php echo $supplyingorder->firstname.'&nbsp;'.$supplyingorder->lastname; ?></td>
                            <td><?php echo $supplyingorder->item; ?></td>
                            <td><?php echo $supplyingorder->sellingprice*$supplyingorder->bs_quanitiy; ?></td>
                            <td><?php echo $supplyingorder->s_app_date; ?></td>
                            <td>
                                            <?php echo anchor("Manageorderstatus/generate_due_payment_so_invoice/" . $supplyingorder->supplierorder_soi_id."/".$supplyingorder->bs_id, '<span class="fa fa-edit"> Generate due payment Invoice</span>', (array('class' => 'btn btn-xs btn-success '))) ?> 
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







