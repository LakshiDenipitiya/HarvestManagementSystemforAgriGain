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
</script>


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


	
		 <div class="box-body">
             <div class="box-header with-border">
            <h3 class="box-title"><a href="<?php echo base_url() ?>/Manageorderstatus/create_advance_payment/">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a>Order Details View</h3>
             
             </div>
	
	
             <div class="box">
		
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
					<!--	<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Buyer Billing Address")?>
					</div>
					<div class="col-md-5">
						<?php echo $bo_details->b_billing_address; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Distpatch Date")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_so_details->b_app_date; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Vehicle Datails")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_so_details->vehicleno ?>
						<?php echo $bo_so_details->ownername ?>
					</div>
				</div>-->
			
			
			<legend>Supplying order Details</legend>
		
<div class= "form-group">
    <div class = "row">
         <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover" id="supplyingorder">
                	<thead>
                    	<tr>
		          <td>Supplier Order Id</td>
		          <td>Supplier Name</td>
		          <td>Supplier billing address</td>
		          <td>Purchase Date</td>
		          <td>Item</td>
		          <td>Quantity</td>
		          <td>Price(Rs.)</td>
		          <td>Sub Total</td>
				</tr>
			</thead>
			<tbody>
                <?php
              
                 foreach($bo_so_details as $rec){
                 ?>
	                 <tr>
			        <td><?php echo $rec->supplierorder_soi_id;?></td>
			          <td><?php echo $rec->title." ".$rec->firstname." ".$rec->lastname;?></td>
			           <td><?php echo $rec->s_billing_address;?></td>
			           <td><?php echo $rec->b_app_date;?></td>
			          <td><?php echo $rec->item;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy;?></td>
			          <td align="right"><?php echo $rec->sellingprice;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy*$rec->sellingprice;?></td>
					</tr>
                 <?php
                 }
                ?>

                <tr>
		         
		          
		          <td colspan=7 align="right"><strong>Grand Total</strong></td>
          		  <td align="right"><strong><?php echo $bo_details->bo_grand_total;?></strong></td>
				</tr>
				</tbody>
		       
</table>
    </div>
</div>
</div>



</br>	
	
	
</div>
</div>


</section>
<!-- /.content -->
