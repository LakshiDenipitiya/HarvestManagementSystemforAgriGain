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
            <h3 class="box-title"> <a href="<?php echo base_url() ?>/Manageorderstatus/index_all_fullview/">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a>Order Details</h3>
             
             </div>
	
	         <div class="box">

		
				<legend>Details of the supplier</legend>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Order No")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $so_details->so_id; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Supplier Name")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $so_details->title.'.&nbsp;'.$so_details->firstname.'&nbsp;'.$so_details->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-3">
						<?php echo $so_details->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-3">
						<?php echo $so_details->email; ?>
					</div>
				</div>
					<!--	<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Supplier Billing Address")?>
					</div>
					<div class="col-md-5">
						<?php echo $bo_details->s_billing_address; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Purchase Date")?>
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
		
			<legend>Buying order Details</legend>
		
	
<div class= "form-group">
    <div class = "row">
         <div class="table table-responsive">
                <table class="table table-bordered table-striped table-hover" id="supplyingorder">
                    <thead>
                        <tr>
                           <td>Buyer Order Id</td>
				          <td>Buyer Name</td>
				          <td>Distpatch Date</td>
				          <td>Item</td>
				          <td>Quantity</td>
				          <td>Price(Rs.)</td>
				          <td>Sub Total</td>
                          
                        </tr>
                    </thead>
                    <tbody>
                    	<tr>
                        <?php foreach ($bo_so_details as $key => $rec) { ?>
                         <td><?php echo $rec->buyerorder_boi_id;?></td>
			          <td><?php echo $rec->title." ".$rec->firstname." ".$rec->lastname;?></td>
			          <td><?php echo $rec->s_app_date;?></td>
			          <td><?php echo $rec->item;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy;?></td>
			          <td align="right"><?php echo $rec->buyingprice;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy*$rec->buyingprice;?></td>
                       
                                    </tr>  
                                       <?php } ?>
                       <tr>
		       
		          
		          <td colspan="6" align="right"><strong>Grand Total</strong></td>
          		  <td align="right"><strong><?php echo $so_details->so_grand_total;?></strong></td>
				</tr>
				

				</tbody>

</table>
    </div>
</div>
</div>



</br>	
	
</div>
</div>

</div>

</section>
<!-- /.content -->
