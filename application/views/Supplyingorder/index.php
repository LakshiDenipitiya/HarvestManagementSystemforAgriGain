<!-- Content Header (Page header) -->
<section class="content-header">
    <style>
    .required:after {
    content:" *";
    position: relative;
    top: 0;
    right: -1px;
    color: red;
}

 .content{
    background-image: url("<?php echo base_url('assertsN/images/cr4.jpg');?>");
    height: 100%;
    width: 100%;
    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 }

 .innercontent{
       /* Full height */
  width: 90%;
  padding-left: 10%;
    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 }

 .box-header{
    background-color: whitesmoke;

 }
</style>

</section>

<!-- Main content -->
<section class="content">
    <div class="innercontent">
    <!-- Display success Message -->
    <?php if ($this->session->flashdata("message")) { ?>

    <p class="success">
        <?php echo $this->session->flashdata("message"); ?>
    </p>

    <?php } ?>


     <div class="box">
       
        <div class="box-body">
           <div class="table table-responsive">
             <div class="box-header with-border">
            <h3 class="box-title">All Orders that you palced...</h3>
             
        </div>
                <table class="table table-bordered table-striped table-hover" id="supplyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>No</th>
                         <!--   <th>Supplier Name</th> -->
                         <!--   <th>Grand Total (Rs.)</th>-->
                            <th>Item</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Status</th> 
                       <!--     <th>Action</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supplyingorderList as $key => $supplyingorder) { ?>
                        <tr>
                            <td><?php echo $supplyingorder->location; ?></td>
                            <td><?php echo $supplyingorder->so_id; ?></td>
                         <!--   <td><?php echo $supplyingorder->firstname.'&nbsp;'.$supplyingorder->lastname; ?></td> -->
                           <!-- <td><?php echo $supplyingorder->so_grand_total; ?></td>-->
                              <td><?php echo $supplyingorder->item; ?></td>
                            <td><?php echo $supplyingorder->date_from; ?></td>
                            <td><?php echo $supplyingorder->date_to; ?></td>
                            <td>
                                       <?php if($supplyingorder->boso_stts==1){
                                    echo "Processing";
                                }else if($supplyingorder->boso_stts==2){
                                    echo "Processing";
                                }else if($supplyingorder->boso_stts==3){
                                    echo "Processing";
                                }else if($supplyingorder->boso_stts==4){
                                    echo "Processing";
                                }else if($supplyingorder->boso_stts==5){
                                    echo "Processing";
                                }else if($supplyingorder->boso_stts==6){
                                    echo "Completed";
                                }else{
                                    echo "Pending";}
                                
                                ?>
                                        </td>  
                                        <td>
                                            <?php echo anchor("Supplyingorder/View/" . $supplyingorder->so_id, '<span class="fa fa-eye"> view</span>', (array('class' => 'btn btn-xs btn-info '))) ?>


                                         <?php
                                          if($supplyingorder->boso_stts==6) {
                                                echo anchor("Supplyingorder/editsupplyingorder/" . $supplyingorder->so_id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-xs btn-primary disabled'))) ; 
                                            } else{ 
                                                 echo anchor("Supplyingorder/editsupplyingorder/" . $supplyingorder->so_id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-xs btn-primary')));
                                           } ?>

                                         <?php
                                          if($supplyingorder->boso_stts==6) {
                                              echo anchor("Supplyingorder/Delete/" . $supplyingorder->so_id, '<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger disabled', 'onclick' => "return confirm('Are you sure?')")); 
                                            } else{ 
                                                echo anchor("Supplyingorder/Delete/" . $supplyingorder->so_id, '<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger', 'onclick' => "return confirm('Are you sure?')"));
                                           } ?>

                                    </td>

                                    </tr>

                                    <!-- <li><?php echo $key . " : " . $supplier->name; ?></li> -->
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <!-- /.content -->







