
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
        Make Advance Payment and Assign Agri Officer
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
                            <th>Location</th>
                            <th>No</th>
                            <th>Supplier Name</th> 
                           <!-- <th>Grand Total</th>-->
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
                           <!-- <td><?php echo $supplyingorder->so_grand_total; ?></td>-->
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







