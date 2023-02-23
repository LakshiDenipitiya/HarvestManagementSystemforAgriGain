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
  width: 70%;
  padding-left: 25%;
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
            <h3 class="box-title">Your Profile </h3>
        </div>
		<div class="box-body">
	

		
				<legend>Details of the Supplier</legend>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Supplier Name")?>
					</div>
					<div class="col-md-5">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $supplier->title.'.&nbsp;'.$supplier->firstname.'&nbsp;'.$supplier->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-5">
						<?php echo $supplier->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Supplier Address")?>
					</div>
					<div class="col-md-5">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $supplier->no.',&nbsp;'.$supplier->lane.',&nbsp;'.$supplier->city; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-5">
						<?php echo $supplier->email; ?>
					</div>
				</div>
		
			
		<br>
			
<div class= "form-group">
    <div class = "row">
         <div class="col-md-6">
                <table class="table table-bordered table-striped table-hover" id="supplyingorder">
                    <thead>
                        <tr>
                            <th>Items you wish to supply</th>
                          <!--  <th>Image</th>-->
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($supplierList as $key => $supplyingorder) { ?>
                        <tr>
                            <td><?php echo $supplyingorder->item; ?></td>
                          <!--  <td><?php echo $supplyingorder->itemimage; ?></td>-->
                                                  
                                    </tr>  
                                       <?php } ?>
</tbody>
</table>
    </div>
</div>
</div>
		<div class = "row">
	<div class= "col-md-2 col-md-offset-4" align="right">
		  <?php echo anchor("Supplier/edit/" . $supplier->id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-primary '))) ?> 
	</div>
	
</div>

</br>	
	
	
</div>

</div>


</section>
<!-- /.content -->
