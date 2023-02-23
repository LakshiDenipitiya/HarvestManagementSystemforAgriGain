
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
        Full View Buying-Supplying Order
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
            <h3 class="box-title">
                <?php if($this->session->userdata('designation_id')=="3"){
                ?>
                <a href="<?php echo base_url() ?>/Manageorderstatus/ready_to_purchased_bo_so/">
                <button class="btn btn-primary btn-sm">Go back</button>
                 </a>
                <?php 
                }else{ ?>
                 <a href="<?php echo base_url() ?>/Manageorderstatus/create_advance_payment/">
                <button class="btn btn-primary btn-sm">Go back</button>
                 </a>
           <?php } ?>

             Buying Order Status</h3>
        
        </div>
        <div class="box-body">
           <div class="table table-responsive">


                <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>No</th>
                            <th>Buyer Name</th> 
                           <!-- <th>Grand Total</th>-->
                            <th>Date From</th>
                            <th>Date To</th> 
                            <th>Status</th>
                            <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_bo_so as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                            <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td>
                        <!--    <td><?php echo $buyingorder->bo_grand_total; ?></td>-->
                            <td><?php echo $buyingorder->date_from; ?></td>
                            <td><?php echo $buyingorder->date_to; ?></td>
                            <td>  <?php if($buyingorder->bs_stts==2){
                                    echo "Buyer Agreed";
                                }else if($buyingorder->bs_stts==3){
                                    echo "Advance to be Paid";
                                }else if($buyingorder->bs_stts==4){
                                    echo "Advance Paid";
                                }else if($buyingorder->bs_stts==5){
                                    echo "Purchased";
                                }else if($buyingorder->bs_stts==6){
                                    echo "Completed";
                                }
                                ?></td>
                                                    <td>
                                             <?php echo anchor("Manageorderstatus/viewbuyingorderstatus/" . $buyingorder->bo_id, '<span class="fa fa-eye"> View</span>', (array('class' => 'btn btn-xs btn-info '))) ?> 
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







