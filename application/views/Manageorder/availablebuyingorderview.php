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
            <h3 class="box-title">Available Buying Orders List</h3>
        </div>
        <div class="box-body">

        	<legend>Supplying Order Details   <?php echo anchor("Supplyingorder/editsupplyingorder/" . $supplyingorderdata->so_id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-info '))); ?></legend>
			
			
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Order No")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplyingorderdata->so_id; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Buyer Name")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplyingorderdata->title.'.&nbsp;'.$supplyingorderdata->firstname.'&nbsp;'.$supplyingorderdata->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplyingorderdata->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplyingorderdata->email; ?>
					</div>
				</div>
		
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Date From")?>
				</div>
				<div class="col-md-3">
					<?php echo $supplyingorderdata->date_from; ?>
				</div>
			</div>
			<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Date To")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplyingorderdata->date_to; ?>
					</div>
				</div>

		
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Location")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplyingorderdata->location; ?>
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
                          foreach($supplyingorderitemdata as $supplyingorderitemdata){
                          	$baltotal +=$supplyingorderitemdata->so_balance_qty;
                             ?>
                             <li><?php echo $supplyingorderitemdata->item?> &nbsp; : <!--<?php echo $supplyingorderitemdata->sitem_quantity?>Kg / Balance--> Quantity - <?php echo $supplyingorderitemdata->so_balance_qty?>Kg</li>
                             <?php       
                          }
						 ?>
						</ul>
					</div>
			</div>


					<legend>Available Buying order Details</legend>
		<div class= "form-group">
		    <div class = "row">
		         <div class="table table-responsive">
		                <table class="table table-bordered table-striped table-hover" id="buyingorder">
		                    <thead>
		                        <tr>
                            <th>Buyer Name</th>
                            <th>Location</th>
                        	<th>Buying order id</th>
                        	<th>Date From</th>
                        	<th>Date To</th>
                            <th>Item</th>
                            <th>Quantitiy</th>
                            <th>Balance Quantitiy</th>  
                            <th>Consent of Supplier</th> 
                          
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach ($availbuyingorderarr as $key => $availbuyingorder) { ?>
                        <tr>
                            <td><?php echo $availbuyingorder->title; ?> <?php echo $availbuyingorder->firstname; ?> <?php echo $availbuyingorder->lastname; ?></td>
                            <td><?php echo $availbuyingorder->location; ?></td>
                            <td><?php echo $availbuyingorder->bo_id; ?></td>
                            <td><?php echo $availbuyingorder->date_from; ?></td>
                            <td><?php echo $availbuyingorder->date_to; ?></td>
                            <td><?php echo $availbuyingorder->item; ?></td>
                            <td><?php echo $availbuyingorder->item_quantity; ?></td>
                            <td><?php echo $availbuyingorder->bo_balance_qty; ?></td>

                       		<td> <?php if($baltotal>0){
                       			echo anchor("Manageorder/buyerconsent/".$supplyingorderdata->so_id."/".$availbuyingorder->bo_id."/".$availbuyingorder->bo_balance_qty."/".$supplyingorderdata->supplier_id."/".$availbuyingorder->buyer_id."/".$availbuyingorder->bo_balance_qty."/".$availbuyingorder->item_i_id, '<span class="fa fa-edit"> I like to Supply</span>', (array('class' => 'btn btn-xs btn-success '))) ?> </td>
                                    </tr>  
                                       <?php } }?>
			</tbody>
								<td colspan="9" align="right"> 
									<?php   if($baltotal==0){
									 echo anchor("Manageorderstatus/index_all_fullview/" . $supplyingorderdata->so_id, '<span class="fa fa-edit"> Proceed</span>', (array('class' => 'btn btn-xs btn-success')));
									} ?> 
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
