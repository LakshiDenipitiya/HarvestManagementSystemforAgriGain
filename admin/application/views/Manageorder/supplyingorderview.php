
<script type="text/javascript">
$(document).ready(function () {
    $('#supplyingorder').DataTable();
});

/*function onStatusChange (requestId, event) {
$.post( "Supplyingorder/updateStatus",{request:requestId, event:event.target.value});
}*/
</script>



<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Supplying Order
        <small>List</small>	
    </h1>

</script>
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('supplyingorder/index'); ?>"><i class="fa fa-book"></i>Supplying order List</a></li>
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
            Supplying Order List</h3>
        </div>
        <div class="box-body">
           <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="supplyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                             <th>Supplying Order No</th>
                            <th>Supplier Name</th> 
                           <!-- <th>Grand Total</th>-->
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supplyingorderList as $key => $supplyingorder) { ?>
                        <tr>
                            <td><?php echo $supplyingorder->location; ?></td>
                              <td><?php echo $supplyingorder->so_id; ?></td>
                            <td><?php echo $supplyingorder->firstname.'&nbsp;'.$supplyingorder->lastname; ?></td>
                          <!--  <td><?php echo $supplyingorder->so_grand_total; ?></td>-->
                            <td><?php echo $supplyingorder->date_from; ?></td>
                            <td><?php echo $supplyingorder->date_to; ?></td>

                                        <td>
                                            <?php echo anchor("Manageorder/availablebuyingorders/" . $supplyingorder->so_id, '<span class="fa fa-edit"> View Available Buying Orders</span>', (array('class' => 'btn btn-xs btn-primary '))) ?>   
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







