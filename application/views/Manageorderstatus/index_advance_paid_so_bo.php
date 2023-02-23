
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
        Advance To be Paid
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
        <div class="box-header with-border">
            <h3 class="box-title">Advance To be Paid</h3>
        
        </div>
        <div class="box-body">
           <div class="table table-responsive">

                    <?php echo form_open("Manageorderstatus/selectordertype_so_bo")?>
                        <div class="table table-responsive">
                           <select name="type" required="required">
                            <option value="">Select Status Type</option>
                            <option value="1">is_buyer_agree</option>
                            <option value="2">is_supplier_agree</option>
                            <option value="3">advance-to_be_paid</option>
                            <option value="2">advance_paid</option>
                            <option value="2">ready_to_purchase</option>
                            <option value="2">purchased</option>
                            <option value="2">ready_to_dispatch</option>
                            <option value="2">finish_process</option>
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
                            <th>No</th>
                            <th>Supplier Name</th> 
                            <th>Grand Total</th>
                            <th>Date From</th>
                            <th>Date To</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($advpaid_so){
                        foreach ($advpaid_so as $key => $supplyingorder) { ?>
                        <tr>
                            <td><?php echo $supplyingorder->location; ?></td>
                            <td><?php echo $supplyingorder->so_id; ?></td>
                            <td><?php echo $supplyingorder->firstname.'&nbsp;'.$supplyingorder->lastname; ?></td>
                            <td><?php echo $supplyingorder->so_grand_total; ?></td>
                            <td><?php echo $supplyingorder->date_from; ?></td>
                            <td><?php echo $supplyingorder->date_to; ?></td>
                            <td>
                                            <?php echo anchor("Manageorderstatus/advance_so_paid_emp_assign/" . $supplyingorder->so_id."/".$supplyingorder->location_id, '<span class="fa fa-edit"> Advance Paid</span>', (array('class' => 'btn btn-xs btn-success '))) ?> 
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







