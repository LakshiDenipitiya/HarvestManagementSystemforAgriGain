<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Order Details
		<small>View</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">

		<div class="box-header with-border"><h3 align="center" class="box-title"> <h3 class="box-title"> <a href="<?php echo base_url() ?>/Manageorderstatus/index_so_fullview/">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a>Order Details for Buying Order No : <?php echo $bo_details->so_id; ?></h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
	

			
			<fieldset class="col-md-6">
				<legend>Details of the Supplier</legend>
				<div class="row">
					<div class="col-md-4">
						<?php echo form_label("Order No")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $bo_details->so_id; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<?php echo form_label("Supplier Name")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $bo_details->title.'.&nbsp;'.$bo_details->firstname.'&nbsp;'.$bo_details->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->email; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<?php echo form_label("Supplier Billing Address")?>
					</div>
					<div class="col-md-5">
						<?php echo $bo_details->s_billing_address; ?>
					</div>
				</div>
				<br>
				<legend></legend>
				<div class="row">
					<div class="col-md-4">
						<?php echo form_label("Purchase Date")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->b_app_date; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<?php echo form_label("Dispatch Date")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->s_app_date; ?>
					</div>
				</div>
				
				
			</fieldset>
			<fieldset class="col-md-12">
			<legend>Buying order Details</legend>
		
<div class= "form-group">
    <div class = "row">
         <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable" id="supplyingorder">
                    	<tr>
		          <td>Buyer Order Id</td>
		          <td>Buyer Name</td>
		        <!--  <td>Distpatch Date</td>-->
		          <td>Item</td>
		          <td>Quantity</td>
		          <td>Price(Rs.)</td>
		          <td>Sub Total</td>
				</tr>
                <?php
              
                 foreach($bo_so_details as $rec){
                 ?>
	                 <tr>
			          <td><?php echo $rec->buyerorder_boi_id;?></td>
			          <td><?php echo $rec->title." ".$rec->firstname." ".$rec->lastname;?></td>
			         <!-- <td><?php echo $rec->s_app_date;?></td>-->
			          <td><?php echo $rec->item;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy;?></td>
			          <td align="right"><?php echo $rec->buyingprice;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy*$rec->buyingprice;?></td>
					</tr>
                 <?php
                 }
                ?>

                <tr>
		          <td></td>
		          <td></td>
		          <td></td>
		          <td></td>
		     	 </td></td>
		     	 
		          <td align="right"><strong>Grand Total</strong></td>
          		  <td align="right"><strong><?php echo $bo_details->so_grand_total;?></strong></td>
				</tr>
				
		       
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
