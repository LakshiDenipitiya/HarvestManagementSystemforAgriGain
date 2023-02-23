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
        Consented Buying Supplying orders
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
            <h3 class="box-title">Completed Supplying order List</h3>
        
        </div>
        <div class="box-body">
           <div class="table table-responsive">

                   <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Completed Orders List</h3>
                        </div>
                        <div class="box-body">
                            
                                <?php echo form_open("Manageorder/selectordertype")?>
                            <div class="table table-responsive">
                               <select name="type" required="required">
                                <option value="">Select Order Type</option>
                                <option value="1">Buying order</option>
                                <option value="2">Supplying order</option>
                               </select>
                               <button type="submit" name="select_type"> 
                                Select
                               </button>
                            <?php echo form_close()?>
                            </div>
                        </div>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($done_bo as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                            <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td>
                            <td><?php echo $buyingorder->bo_grand_total; ?></td>
                            <td><?php echo $buyingorder->date_from; ?></td>
                            <td><?php echo $buyingorder->date_to; ?></td>
                          
                             <td>
                                             <?php echo anchor("Manageorderstatus/viewconsentedorder/" . $buyingorder->bo_id, '<span class="fa fa-eye"> Generate Invoice</span>', (array('class' => 'btn btn-xs btn-info '))) ?> 
                                        </td>
                                        <td>
                                             <?php echo anchor("Manageorderstatus/viewconsentedorder/" . $buyingorder->bo_id, '<span class="fa fa-eye"> Goods recieve notice</span>', (array('class' => 'btn btn-xs btn-info '))) ?> 
                                        </td>
                                    </tr>

                                    <!-- <li><?php echo $key . " : " . $supplier->name; ?></li> -->
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->

