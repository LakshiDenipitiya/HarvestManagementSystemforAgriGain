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
                <table class="table table-bordered table-striped table-hover" id="buyingorder">
                   <thead>
                        <tr>
                            <th>Location</th>
                            <th>No</th>
                          <!--  <th>Buyer Name</th> -->
                          <!--  <th>Grand Total</th> -->
                            <th>Item</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Status</th> 
                         <!--   <th>Action</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buyingorderList as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->location; ?></td>
                            <td><?php echo $buyingorder->bo_id; ?></td>
                        <!--    <td><?php echo $buyingorder->firstname.'&nbsp;'.$buyingorder->lastname; ?></td>-->
                          <!--  <td><?php echo $buyingorder->bo_grand_total; ?></td>-->
                            <td><?php echo $buyingorder->item; ?></td>
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
                                              <?php echo anchor("Buyingorder/View/" . $buyingorder->bo_id, '<span class="fa fa-eye"> view</span>', (array('class' => 'btn btn-xs btn-info '))) ?> 


                                         <?php
                                          if($buyingorder->boso_stts==6) {
                                                 echo anchor("Buyingorder/editbuyingorder/" . $buyingorder->bo_id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-xs btn-primary disabled '))) ; 
                                            } else{ 
                                                  echo anchor("Buyingorder/editbuyingorder/" . $buyingorder->bo_id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-xs btn-primary ')));
                                           } ?>

                                         <?php
                                          if($buyingorder->boso_stts==6) {
                                              echo anchor("Buyingorder/Delete/" . $buyingorder->bo_id, '<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger disabled', 'onclick' => "return confirm('Are you sure?')")); 
                                            } else{ 
                                                echo anchor("Buyingorder/Delete/" . $buyingorder->bo_id, '<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger', 'onclick' => "return confirm('Are you sure?')"));
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







