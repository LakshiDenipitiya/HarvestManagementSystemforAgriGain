<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Consented Order
		<small>View</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">

		<div class="box-header with-border"><h3 align="center" class="box-title">Consented order Details</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
	

			
			<fieldset class="col-md-6">
				<legend>Details of the Buyer</legend>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Order No")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $bo_details->bo_id; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Buyer Name")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $bo_details->title.'.&nbsp;'.$bo_details->firstname.'&nbsp;'.$bo_details->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->email; ?>
					</div>
				</div>
			</fieldset>
			<fieldset class="col-md-12">
			<legend>Supplying order Details</legend>
			<div class="row">
				<div class="col-md-3">
					<?php echo form_label("Date From")?>
				</div>
				<div class="col-md-3">
					<?php echo $so_bo_details->date_from; ?>
				</div>
			</div>
			<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Date To")?>
					</div>
					<div class="col-md-3">
						<?php echo $so_bo_details->date_to; ?>
					</div>
				</div>

		
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Order Status")?>
					</div>
					<div class="col-md-3">
						<?php echo $so_bo_details->status; ?>
					</div>
			</div>
<div class= "form-group">
    <div class = "row">
         <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="supplyingorder">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Image</th>
                            <th>Unit Price</th> 
                            <th>Quantitiy</th>
                            <th>Total</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($so_bo_details as $key => $supplyingorder) { ?>
                        <tr>
                            <td><?php echo $supplyingorder->item; ?></td>
                            <td><?php echo $supplyingorder->item_i_id; ?></td>
                            <td><?php echo $supplyingorder->sellingprice; ?></td>
                            <td><?php echo $supplyingorder->item_quantity; ?></td>
                            <td><?php echo $supplyingorder->sellingprice*$supplyingorder->item_quantity; ?></td>
                       
                                    </tr>  
                                       <?php } ?>
</tbody>
</table>
    </div>
</div>
</div>
</fieldset>
<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Total Price")?>
					</div>
					<div class="col-md-3">
						<?php echo $so_bo_details->so_grand_total; ?>
					</div>
			</div>
</br>	
	
	<fieldset class="col-md-6">
				<legend>Order purshase and dispatch details</legend>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Assigned agriculture officer")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $bo_details->bo_id; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Assgined vehicle")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $bo_details->title.'.&nbsp;'.$bo_details->firstname.'&nbsp;'.$bo_details->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Purchase Date")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $bo_details->title.'.&nbsp;'.$bo_details->firstname.'&nbsp;'.$bo_details->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Dispatch Date")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->nicno; ?>
					</div>
				</div>
				
			</fieldset>
</div>

</div>


</section>
<!-- /.content -->
