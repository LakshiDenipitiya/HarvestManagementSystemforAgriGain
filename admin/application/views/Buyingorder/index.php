
<script type="text/javascript">
$(document).ready(function () {
    $('#buyingorder').DataTable();
});


function updateStatus (el, bo_id) {
    var actstatus = "0";
    if (el.checked) {
        actstatus = "1";
    };
    window.location.href = "<?php echo base_url() ?>Buyingorder/update_status/"+bo_id+"/"+actstatus;
}
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
            <h3 class="box-title">Buying Order List</h3>
            <?php echo anchor("/Buyingorder/create", '<span class="fa fa-files-o"> Create</span>', array('class' => 'btn btn-primary pull-right')); ?>
        </div>
        <div class="box-body">
           <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>No</th>
                            <th>Buyer Name</th> 
                           <!-- <th>Grand Total (Rs.)</th>-->
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Status</th> 
                            <th>Activate/ Deactivate</th>
                            <th>Action</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buyingorderList as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                            <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td>
                          <!--  <td><?php echo $buyingorder->bo_grand_total; ?></td>-->
                            <td><?php echo $buyingorder->date_from; ?></td>
                            <td><?php echo $buyingorder->date_to; ?></td>
                            
                            <td>
                                    <?php if($buyingorder->boso_stts==1){
                                    echo "Processing";
                                }else if($buyingorder->boso_stts==2){
                                    echo "Processing";
                                }else if($buyingorder->boso_stts==3){
                                    echo "Processing";
                                }else if($buyingorder->boso_stts==4){
                                    echo "Processing";
                                }else if($buyingorder->boso_stts==5){
                                    echo "Processing";
                                }else if($buyingorder->boso_stts==6){
                                    echo "Completed";
                                }else{
                                    echo "Pending";}
                                ?>
                                        </td>  
                                        <td>
                                        <?php    if($buyingorder->boso_stts==6){ ?>
                                <input onchange="updateStatus(this, <?php echo $buyingorder->bo_id ?>)" type="checkbox" data-size="mini" <?php if($buyingorder->actstatus=='1') {echo 'checked';}?> data-toggle="toggle" data-on="Inactive" data-off="Active" data-onstyle="danger" data-offstyle="success" disabled="true">

                                  <?php    }else{?>
                                 <input onchange="updateStatus(this, <?php echo $buyingorder->bo_id ?>)" type="checkbox" data-size="mini" <?php if($buyingorder->actstatus=='1') {echo 'checked';}?> data-toggle="toggle" data-on="Inactive" data-off="Active" data-onstyle="danger" data-offstyle="success">
                                <?php  }?>
                            </td>

                                        <td>
                                              <?php echo anchor("Buyingorder/View/" . $buyingorder->bo_id, '<span class="fa fa-eye"> view</span>', (array('class' => 'btn btn-xs btn-info '))) ?> 
                                        </td>
                                        <!--  <td>

                                        <?php

                                     
                                           if($buyingorder->boso_stts==6){
                                            echo anchor("Buyingorder/editbuyingorder/" . $buyingorder->bo_id."/".$buyingorder->byrid, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-xs btn-primary disabled')));
                                        }else{
                                            echo anchor("Buyingorder/editbuyingorder/" . $buyingorder->bo_id."/".$buyingorder->byrid, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-xs btn-primary'))) ; 
                                        }


                                           ?>
                                       </td>
                                       <td>
                                         <?php
                                          if($buyingorder->boso_stts==6) {
                                              echo anchor("Buyingorder/Delete/" . $buyingorder->bo_id, '<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger disabled ', 'onclick' => "return confirm('Are you sure?')")); 
                                            } else{ 
                                                echo anchor("Buyingorder/Delete/" . $buyingorder->bo_id, '<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger ', 'onclick' => "return confirm('Are you sure?')"));
                                           } ?>

                                        </td>-->
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







