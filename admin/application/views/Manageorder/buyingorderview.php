
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
        Buying Order
        <small>List</small>	
    </h1>

</script>
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('buyingorder/index'); ?>"><i class="fa fa-book"></i>Buying order List</a></li>
</ol>

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
            <h3 class="box-title">
                <a href="<?php echo base_url() ?>/manageorder">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a>
            Buying Order List</h3>
            <?php echo anchor("/Buyingorder/create", '<span class="fa fa-files-o"> Create</span>', array('class' => 'btn btn-primary pull-right')); ?>
        </div>
        <div class="box-body">
           <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                             <th>Buying Order No</th>
                            <th>Buyer Name</th> 
                         <!--   <th>Grand Total</th>-->
                            <th>Date From</th>
                            <th>Date To</th> 
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buyingorderList as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                            <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td>
                           <!-- <td><?php echo $buyingorder->bo_grand_total; ?></td>-->
                            <td><?php echo $buyingorder->date_from; ?></td>
                            <td><?php echo $buyingorder->date_to; ?></td>
                  

                                        <td>
                                            <?php echo anchor("Manageorder/availablesupplyingorders/" . $buyingorder->bo_id, '<span class="fa fa-edit"> View Available Supplying Orders</span>', (array('class' => 'btn btn-xs btn-primary '))) ?>  

                                       
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







