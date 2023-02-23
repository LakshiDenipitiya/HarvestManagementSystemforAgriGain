

<section class="content-header">
 <style type="text/css">
    .dataTables_filter,.dataTables_info { display:none;}
    </style>
  </style>


<script type="text/javascript">
$(document).ready(function () {
    $('#supplyingorder').DataTable();
});

/*function onStatusChange (requestId, event) {
$.post( "Supplyingorder/updateStatus",{request:requestId, event:event.target.value});
}*/
</script>
</section>

<!-- Content Header (Page header) -->
<section class="content-header">
<div class="row">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Supplying Order List</h3>
            
        </div>
        <div class="box-body">
           <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="supplyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>No</th>
                            <th>Supplier Name</th> 
                            <th>Grand Total</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Status</th> 

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supplyingorderList as $key => $supplyorder) { ?>
                        <tr>
                            <td><?php echo $supplyorder->code; ?></td>
                            <td><?php echo $supplyorder->so_id; ?></td>
                            <td><?php echo $supplyorder->firstname.'&nbsp;'.$supplyorder->lastname; ?></td>
                            <td><?php echo $supplyorder->so_grand_total; ?></td>
                            <td><?php echo $supplyorder->date_from; ?></td>
                            <td><?php echo $supplyorder->date_to; ?></td>
                              <td>
                                <?php if($supplyorder->so_stts==1){
                                    echo "Completed";
                                }else{
                                    echo "Pending";
                                }

                                ?>
                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                  <a target="_blank" href="<?php echo base_url('Reportsupplyorder/supplyorderReport');?>" class="btn btn-success pull-right">Print</a><br>
              </div>
            </section>
            <!-- /.content -->







