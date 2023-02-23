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
		background-image: url("<?php echo base_url('assertsN/images/ll.jpg');?>");
		/* Full height */
		height: 25%; 

		/* Center and scale the image nicely */
		background-position: top;
		background-repeat: no-repeat;
		background-size: cover;
	};



	</style> 
</section>
<?php echo form_open()?>
<!-- Main content -->
<section class="content">

	<div class="container">
</br>
		<div class="box box-default col-md-8 col-md-offset-2" style="background-color:#20BF55;">

			<div class="box-header with-border"><h3 align="center" class="box-title">Change your password..</h3>
			</div>
			<div class="box-body">
			</br>
			<!--form open from save function-->


			<!--color input feild-->
			<div class = "row">
				<div class= "required col-md-3 col-md-offset-2">
					<?php echo form_label("password")?>
				</div>
				<div class= "col-md-5 col-md-offset-0">
					<?php echo form_input(array("id"=>"password", "name" => "password","type"=>"password","class" => "form-control","value"=>set_value('password')))?>
					<?php echo form_error('password');?>
				</div>
			</div>

		</br>
		<div class = "row">
			<div class= "required col-md-3 col-md-offset-2">
				<?php echo form_label("Confirm password")?>
			</div>
			<div class="col-sm-5">
				<?php echo form_input(array("id"=>"confirmpassword", "name" => "confirmpassword","type"=>"password", "class" => "form-control","value"=>set_value('password')))?>
				<?php echo form_error('password');?>
			</div>
		</div>
	</br>
	<!--butotns-->
	<div class = "row">
		<div class= "col-md-3 col-md-offset-5">
			<?php echo form_submit(array('value' => 'Set new password','class'=>'btn btn-primary form-control'))?>
		</div>
		<div class= "col-md-2 col-md-offset-0">
			<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default '))?>
		</div>
	</div>
</br>
<!--form close-->
<?php echo form_close()?>
</div>
</div>
</br>
</div>

</br>
</section>
<!-- /.content -->


