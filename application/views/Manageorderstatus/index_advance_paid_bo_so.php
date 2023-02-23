
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

                 <?php echo form_open("Manageorderstatus/selectordertype")?>
                        <div class="table table-responsive">
                           <select name="type" required="required">
                            <option value="">Select Status Type</option>
                            <option value="7">All</option>
                            <option value="1">Is buyer agreed</option> 
                            <option value="3">Advance to be paid</option>
                            <option value="4">Advance paid</option>
                            <option value="5">Purchased</option>
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
                            <th>Buyer Name</th> 
                            <th>Grand Total</th>
                            <th>Date From</th>
                            <th>Date To</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($advpaid_bo){
                        foreach ($advpaid_bo as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                            <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td>
                            <td><?php echo $buyingorder->bo_grand_total; ?></td>
                            <td><?php echo $buyingorder->date_from; ?></td>
                            <td><?php echo $buyingorder->date_to; ?></td>
                            <td>
                                            <?php echo anchor("Manageorderstatus/advance_paid_emp_assign/" . $buyingorder->bo_id."/".$buyingorder->location_id, '<span class="fa fa-edit"> Advance Paid</span>', (array('class' => 'btn btn-xs btn-success '))) ?> 
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







