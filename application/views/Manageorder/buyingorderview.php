

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
        <div class="box-header with-border">
            <h3 class="box-title">
            Buying Order List</h3>
        </div>
        <div class="box-body">
           <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Buying Order No</th>
                          <!--  <th>Grand Total (Rs.)</th>-->
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
            </div>
            </section>
            <!-- /.content -->







