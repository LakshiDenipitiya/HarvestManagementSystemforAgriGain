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
	

		
				<legend>Details of the Buyer</legend>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Buyer Name")?>
					</div>
					<div class="col-md-3">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $buyer->title.'.&nbsp;'.$buyer->firstname.'&nbsp;'.$buyer->lastname; ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("NIC No")?>
					</div>
					<div class="col-md-3">
						<?php echo $buyer->nicno; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Buyer Address")?>
					</div>
					<div class="col-md-5">
						<!-- <?php print_r($supplier); ?> -->
						<?php echo $buyer->no.',&nbsp;'.$buyer->lane.',&nbsp;'.$buyer->city; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<?php echo form_label("Email")?>
					</div>
					<div class="col-md-3">
						<?php echo $buyer->email; ?>
					</div>
				</div>
		
			
		
			
<div class= "form-group">
    <div class = "row">
         <div class="col-md-6">
                <table class="table table-bordered table-striped table-hover" id="buyingorder">
                    <thead>
                        <tr>
                            <th>Items you wish to buy</th>
                       <!--     <th>Image</th>-->
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buyerList as $key => $buyingorder) { ?>
                        <tr>
                            <td><?php echo $buyingorder->item; ?></td>
                     <!--       <td><?php echo $buyingorder->itemimage; ?></td>-->
                                                  
                                    </tr>  
                                       <?php } ?>
</tbody>
</table>
    </div>
</div>
</div>
		<div class = "row">
	<div class= "col-md-2 col-md-offset-4" align="right">
		  <?php echo anchor("Buyer/edit/" . $buyer->id, '<span class="fa fa-edit"> Edit</span>', (array('class' => 'btn btn-primary '))) ?> 
	</div>
	
</div>

</br>	
	
	
</div>

</div>


</section>
<!-- /.content -->
