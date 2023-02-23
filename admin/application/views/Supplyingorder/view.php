<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Supplying Order
		<small>View</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">
		<div class="box-header with-border"><h3 align="center" class="box-title">
			<a href="<?php echo base_url() ?>/supplyingorder">
				<button class="btn btn-primary btn-sm">Go back</button>
			</a> Buying Order Details</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
	

			
			<fieldset class="col-md-6">
				<legend>Details of the Supplier</legend>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Order No")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $supplier->so_id; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Supplier Name")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $supplier->title.'.&nbsp;'.$supplier->firstname.'&nbsp;'.$supplier->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplier->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplier->email; ?>
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
					<?php echo $supplier->date_from; ?>
				</div>
			</div>
			<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Date To")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplier->date_to; ?>
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
                            <th>Unit Price (Rs.)</th> 
                            <th>Quantitiy</th>
                            <th>Total (Rs.)</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supplyingorderList as $key => $supplyingorder) { ?>
                        <tr>
                            <td><?php echo $supplyingorder->item; ?></td>
                            <td><?php echo $supplyingorder->itemimage; ?></td>
                            <td><?php echo $supplyingorder->buyingprice; ?></td>
                            <td><?php echo $supplyingorder->sitem_quantity; ?></td>
                            <td><?php echo $supplyingorder->buyingprice*$supplyingorder->sitem_quantity; ?></td>
                       
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
						<?php echo form_label("Total Price (Rs.)")?>
					</div>
					<div class="col-md-3">
						<?php echo $supplier->so_grand_total; ?>
					</div>
			</div>
</br>	
	
	
</div>

</div>


</section>
<!-- /.content -->
