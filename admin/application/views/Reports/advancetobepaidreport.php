<section class="content-header">
 <style type="text/css">
    .dataTables_filter,.dataTables_info { display:none;}
    </style>
  </style>
<script type="text/javascript">
$(document).ready(function () {
    $('#buyingorder').DataTable();
});

/*function onStatusChange (requestId, event) {
$.post( "Buyingorder/updateStatus",{request:requestId, event:event.target.value});
}*/
</script>
</section>




<!-- Main content -->
<section class="content">
   <div class="row">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Advance To be Paid Buying Orders</h3>
        
        </div>
        <div class="box-body">
           <div class="table table-responsive">

                    <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>No</th>
                            <th>Buyer Name</th> 
                            <th>Advance Payment (Rs.)</th>
                            <th>Date From</th>
                            <th>Date To</th> 
                       
                        </tr>
                    </thead>
                    <tbody>

                        <?php if($done_bo){
                        foreach ($done_bo as $key => $done_bo) { ?>
                        <tr>
                            <td><?php echo $done_bo->location; ?></td>
                            <td><?php echo $done_bo->bo_id; ?></td>
                            <td><?php echo $done_bo->firstname.'&nbsp;'.$done_bo->lastname; ?></td>
                            <td><?php echo $done_bo->bo_grand_total*30/100; ?></td>
                            <td><?php echo $done_bo->date_from; ?></td>
                            <td><?php echo $done_bo->date_to; ?></td>
                           
                            
                                    </tr>

                                   
                                    <?php } } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <a target="_blank" href="<?php echo base_url('Reportadvancetobepaid/advancetobepaidReport');?>" class="btn btn-success pull-right">Print</a><br>
             </div>
            </section>
            <!-- /.content -->







