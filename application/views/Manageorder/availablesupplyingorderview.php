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
 .box-body{
 	background-color: whitesmoke;
 	padding: 20px;
 }
</style>
</section>

<!-- Main content -->
<section class="content">

	<div class="innercontent">
	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>
	
	<!--display sucess message-->
	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>
	
	<?php } ?>


	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Available Supplying Orders List</h3>
        </div>
        <div class="box-body">			

				<legend>Buying Order Details   <?php echo anchor("Buyingorder/editbuyingorder/" . $buyingorderdata->bo_id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-info '))); ?></legend>
  
        

				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Order No")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $buyingorderdata->bo_id; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Buyer Name")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $buyingorderdata->title.'.&nbsp;'.$buyingorderdata->firstname.'&nbsp;'.$buyingorderdata->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-3">
						<?php echo $buyingorderdata->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-3">
						<?php echo $buyingorderdata->email; ?>
					</div>
				</div>
			
			
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Date From")?>
				</div>
				<div class="col-md-3">
					<?php echo $buyingorderdata->date_from; ?>
				</div>
			</div>
			<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Date To")?>
					</div>
					<div class="col-md-3">
						<?php echo $buyingorderdata->date_to; ?>
					</div>
				</div>

		
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Location")?>
					</div>
					<div class="col-md-3">
						<?php echo $buyingorderdata->location; ?>
					</div>
			</div>

			<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Requested Items")?>
					</div>
					<div class="col-md-10 col-md-offset-2">
						<ul>
						<?php 
						  $baltotal = 0;
                          foreach($buyingorderitemdata as $buyingorderitemdata){
                          	$baltotal +=$buyingorderitemdata->bo_balance_qty;
                             ?>
                             <li><?php echo $buyingorderitemdata->item?> &nbsp; : <!--<?php echo $buyingorderitemdata->item_quantity?>Kg / Balance--> Quantity - <?php echo $buyingorderitemdata->bo_balance_qty?>Kg </li>
                             <?php  


                          }

						 ?>
						</ul>
					</div>
			</div>


			<legend>Available Supplying order Details</legend>
<div class= "form-group">
    <div class = "row">

         <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
                    <thead>
                        <tr>
                        	<th>Supplier Name</th>
                        	<th>Location</th>
                        	<th>Supplying order id</th>
                        	<th>Date From</th>
                        	<th>Date To</th>
                            <th>Item</th>
                            <th>Quantitiy</th> 
                            <th>Balance Quantitiy</th> 
                            <th>Consent of Buyer</th>                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($availsupplyingorderarr as $key => $availsupplyingorder) { ?>
                        <tr>
                            <td><?php echo $availsupplyingorder->title; ?> <?php echo $availsupplyingorder->firstname; ?> <?php echo $availsupplyingorder->lastname; ?></td>
                            <td><?php echo $availsupplyingorder->location; ?></td>
                            <td><?php echo $availsupplyingorder->so_id; ?></td>
                            <td><?php echo $availsupplyingorder->date_from; ?></td>
                            <td><?php echo $availsupplyingorder->date_to; ?></td>
                            <td><?php echo $availsupplyingorder->item; ?></td>
                            <td><?php echo $availsupplyingorder->sitem_quantity; ?></td>
                            <td><?php echo $availsupplyingorder->so_balance_qty; ?></td>

                       		<td> <?php 
                            if($baltotal>0){
                       		echo anchor("Manageorder/supplierconsent/".$buyingorderdata->bo_id."/".$availsupplyingorder->so_id."/".$availsupplyingorder->so_balance_qty."/".$buyingorderdata->buyer_id."/".$availsupplyingorder->supplier_id."/".$availsupplyingorder->so_balance_qty."/".$availsupplyingorder->item_i_id, '<span class="fa fa-edit"> I like to buy</span>', (array('class' => 'btn btn-xs btn-success ')));
                            }
                       	?> </td>
                                    </tr>  
                                       <?php } ?>
</tbody>
						<td colspan="9" align="right">
							
							<?php   if($baltotal==0){
								echo anchor("Manageorderstatus/index_all_fullview/" . $buyingorderdata->bo_id, '<span class="fa fa-edit"> Proceed</span>', (array('class' => 'btn btn-xs btn-success '))); } ?> 
						</td>
</table>
    </div>
</div>
</div>

	
	
	
</div>
</div>
</div>


</section>
<!-- /.content -->
