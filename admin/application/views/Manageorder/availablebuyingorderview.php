<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Available Buying orders
		<small>View</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
 
	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>
	
	<!--display sucess message-->
	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>
	
	<?php } ?>


	<div class="box box-default">

		<div class="box-header with-border"><h3 align="center" class="box-title">
			<h3 class="box-title">
                <a href="<?php echo base_url() ?>/manageorder/supplyingordermanage">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a>
		Available Buying Order Details</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
	

			
			<fieldset class="col-md-6">
				<legend>Supply Order Details</legend>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Order No")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $supplyingorderdata->so_id; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Buyer Name")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
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
					<div class="col-md-8">
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
                          foreach($supplyingorderitemdata as $supplyingorderitemdata){
                             ?>
                             <li><?php echo $supplyingorderitemdata->item?> &nbsp; : <!--<?php echo $supplyingorderitemdata->sitem_quantity?>Kg / Balance--> Quantity - <?php echo $supplyingorderitemdata->so_balance_qty?>Kg</li>
                             <?php       
                          }
						 ?>
						</ul>
					</div>
			</div>
			</fieldset>

<fieldset class="col-md-12">
			<legend>Available Buying order Details</legend>
<div class= "form-group">
    <div class = "row">
         <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="buyingorder">
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
                       		<td> <?php echo anchor("Manageorder/buyerconsent/".$supplyingorderdata->so_id."/".$availbuyingorder->bo_id."/".$availbuyingorder->bo_balance_qty."/".$supplyingorderdata->supplier_id."/".$availbuyingorder->buyer_id."/".$availbuyingorder->bo_balance_qty."/".$availbuyingorder->item_i_id, '<span class="fa fa-edit"> I like to Supply</span>', (array('class' => 'btn btn-xs btn-success '))) ?> </td>
                                    </tr>  
                                       <?php } ?>
</tbody>
</table>
    </div>
</div>
</div>
</fieldset>

</br>	
	
	
</div>

</div>


</section>
<!-- /.content -->
