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
 	background-image: url("<?php echo base_url('assertsN/images/cr.jpg');?>");
 	 /* Full height */
    height: 25%; 

    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 }
.btn{
	padding: 20px;
	font-size: 30px;
}
.header-text{
	background-color: lightcyan;
	font-size: 25px;

}

	</style> 
</section>

<!-- Main content -->
<section class="content">
</br>
<div class="container">
		
	<div class="header-text">Register with us and have a better experiance in the e-Business!!</div>
	<br>
		
			<div>
				<a href="<?php echo base_url('index.php/supplier/create'); ?>"><button class="btn btn-neutral col-lg-5 col-lg-offset-0">
			Register as Supplier <br> <h5>Click here to Register </h5>
			</button></a>
			
			</div>

			
			
			<div>
				<a href="<?php echo base_url('index.php/buyer/create'); ?>"><button class="btn btn-neutral col-lg-5 col-lg-offset-2">
			Register as Buyer <br> <h5>Click here to Register </h5>
			</button></a>
			</div>



</div>

<br>


</section>
<!-- /.content -->
