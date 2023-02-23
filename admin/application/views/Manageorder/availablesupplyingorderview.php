<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Available Supplying orders
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
			<a href="<?php echo base_url() ?>/manageorder/buyingordermanage">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a>
		Available Supplying Order Details</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
	

			
			<fieldset class="col-md-6">
				<legend>Buying Order Details</legend>
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
					<div class="col-md-8">
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
                          foreach($buyingorderitemdata as $buyingorderitemdata){
                             ?>
                             <li><?php echo $buyingorderitemdata->item?> &nbsp; : <!--<?php echo $buyingorderitemdata->item_quantity?>Kg / Balance--> Quantity - <?php echo $buyingorderitemdata->bo_balance_qty?>Kg </li>
                             <?php       
                          }
						 ?>
						</ul>
					</div>
			</div>
			</fieldset>
<fieldset class="col-md-12">
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

                       		<td> <?php echo anchor("Manageorder/supplierconsent/".$buyingorderdata->bo_id."/".$availsupplyingorder->so_id."/".$availsupplyingorder->so_balance_qty."/".$buyingorderdata->buyer_id."/".$availsupplyingorder->supplier_id."/".$availsupplyingorder->so_balance_qty."/".$availsupplyingorder->item_i_id, '<span class="fa fa-edit"> I like to Buy</span>', (array('class' => 'btn btn-xs btn-success '))) ?> </td>
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
