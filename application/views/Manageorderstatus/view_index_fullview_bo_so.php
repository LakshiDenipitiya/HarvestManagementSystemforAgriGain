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
            <h3 class="box-title">Order Details </h3>
        </div>
        <div class="box-body">	
        	<?php 
        	if($bo_details->boso_stts==1){
              $supplier_agreed_status = "<font style='color:green'>Done</font>";
              $buyer_agreed_status = "Pending";
              $advance_payment_status = "Pending";
              $ready_to_purchase_status = "Pending";
              $ready_to_dispatch_status = "Pending";
              $completed_status = "Pending";
        	}else if($bo_details->boso_stts==2){
 			  $supplier_agreed_status = "<font style='color:green'>Done</font>";
              $buyer_agreed_status = "<font style='color:green'>Done</font>";
              $advance_payment_status = "Pending";
              $ready_to_purchase_status = "Pending";
              $ready_to_dispatch_status = "Pending";
              $completed_status = "Pending";
          }else if($bo_details->boso_stts==3){
 			  $supplier_agreed_status = "<font style='color:green'>Done</font>";
              $buyer_agreed_status = "<font style='color:green'>Done</font>";
              $advance_payment_status = "<font style='color:brown'>Processing</font>";
              $ready_to_purchase_status = "Pending";
              $ready_to_dispatch_status = "Pending";
              $completed_status = "Pending";
          }else if($bo_details->boso_stts==4){
 			  $supplier_agreed_status = "<font style='color:green'>Done</font>";
              $buyer_agreed_status = "<font style='color:green'>Done</font>";
              $advance_payment_status = "<font style='color:green'>Done</font>";
              $ready_to_purchase_status = "<font style='color:brown'>Processing</font>";
              $ready_to_dispatch_status = "Pending";
              $completed_status = "Pending";
          }else if($bo_details->boso_stts==5){
 			  $supplier_agreed_status = "<font style='color:green'>Done</font>";
              $buyer_agreed_status = "<font style='color:green'>Done</font>";
              $advance_payment_status = "<font style='color:green'>Done</font>";
              $ready_to_purchase_status = "<font style='color:green'>Done</font>";
              $ready_to_dispatch_status = "<font style='color:brown'>Processing</font>";
              $completed_status = "Pending";
          }else if($bo_details->boso_stts==6){
 			  $supplier_agreed_status = "<font style='color:green'>Done</font>";
              $buyer_agreed_status = "<font style='color:green'>Done</font>";
              $advance_payment_status = "<font style='color:green'>Done</font>";
              $ready_to_purchase_status = "<font style='color:green'>Done</font>";
              $ready_to_dispatch_status = "<font style='color:green'>Done</font>";
              $completed_status = "<font style='color:green'>Done</font>";
          }
        	?>
        	<table class="table table-bordered table-striped table-hover" border="1">
        		<thead>
        			<tr>
        				<td align="center"><strong>Status</strong></td>
        				<td align="center"><strong>Action by</strong></td>
        				<td align="center"><strong>Current status</strong></td>
        			</tr>
        		</thead>
        		<tbody>
        		<!--	<tr>
        				<td>Supplier agreed - Ready to Advance Payment</td>
        				<td>Supplier</td>
        				<td><?php echo $supplier_agreed_status;?></td>
        			</tr> -->
        			<tr>
        				<td>Buyer agreed - Ready to Advance Payment</td>
        				<td>Buyer</td>
        				<td><?php echo $buyer_agreed_status;?></td>
        			</tr>
        			<tr>
        				<td>Advance Payment - Assign Agri Officer</td>
        				<td>Admin</td>
        				<td><?php echo $advance_payment_status;?></td>
        			</tr>
        			<tr>
        				<td>Ready to purchase</td>
        				<td>Agriculture officer</td>
        				<td><?php echo $ready_to_purchase_status;?></td>
        			</tr>
        			<tr>
        				<td>Ready to distpatch</td>
        				<td>Agriculture officer</td>
        				<td><?php echo $ready_to_dispatch_status;?></td>
        			</tr>
        			<tr>
        				<td>Completed</td>
        				<td></td>
        				<td><?php echo $completed_status;?></td>
        			</tr>
        		</tbody>
        	</table>
		
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
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Buyer Billing Address")?>
					</div>
					<div class="col-md-5">
						<?php echo $bo_details->b_billing_address; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Purchase Date")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->b_app_date; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Distpatch Date")?>
					</div>
					<div class="col-md-3">
						<?php echo $bo_details->s_app_date; ?>
					</div>
				</div>
	
		
			<legend>Supplying order Details</legend>
		
<div class= "form-group">
    <div class = "row">
         <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover" id="supplyingorder">
                    	<tr>
		           <td>Supplier Order Id</td>
		          <td>Supplier Name</td>
		          <td>Supplier billing address</td>
		       <!--   <td>Purchase Date</td>-->
		          <td>Item</td>
		          <td>Quantity</td>
		          <td>Price(Rs.)</td>
		          <td>Sub Total</td>
				</tr>
                <?php
              
                 foreach($bo_so_details as $rec){
                 ?>
	                 <tr>
			          <td><?php echo $rec->supplierorder_soi_id;?></td>
			          <td><?php echo $rec->title." ".$rec->firstname." ".$rec->lastname;?></td>
			           <td><?php echo $rec->s_billing_address;?></td>
			       <!--    <td><?php echo $rec->b_app_date;?></td>-->
			          <td><?php echo $rec->item;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy;?></td>
			          <td align="right"><?php echo $rec->sellingprice;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy*$rec->sellingprice;?></td>
					</tr>
                 <?php
                 }
                ?>

                <tr>
                	<td></td>
                	<td></td>
		          <td></td>
		          <td></td>
		          <td></td>
		      
		          <td align="right"><strong>Grand Total</strong></td>
          		  <td align="right"><strong><?php echo $bo_details->bo_grand_total;?></strong></td>
				</tr>
				
		       
</table>
    </div>
</div>
</div>


</div>
	
	
</div>

</div>


</section>
<!-- /.content -->
