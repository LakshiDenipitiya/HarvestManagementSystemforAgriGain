<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Stakeholder
		<small>create</small>
	</h1>

</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Set Username and Passwords for Stakeholders</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">

			<?php echo form_open("Stakeholder/save")?>
			<div class= "form-group">

				<div class = "row">
					<div class= "col-md-3 col-md-offset-1">
						<?php echo form_label("Name of the Employee")?>
					</div>
					<div class= "col-md-4 col-md-offset-0">	
						<?php 

						$data = array(
							'id'=>'employee_id',
							'class'=>'form-control',
							'name'=>'firstname');

						echo form_dropdown ('employee_id',$employeeList,set_value('employee_id'),$data);
						echo form_error('employee_id');?>
					</div>
					<div class= "col-md-2 col-md-offset-0">	
						
						<a href="<?php echo base_url('employee/create'); ?>" class="btn btn-info">Add New</a>
						
					</div>
				</div>
			</br>
			
			<div class = "row">
				<div class= "col-md-3 col-md-offset-1">
					<?php echo form_label("Username")?>
				</div>
				<div class= "col-md-4">
					<?php echo form_input(array("id"=>"username", "name" => "username", "class" => "form-control","value"=>set_value('username')))?>
					<?php echo form_error('username');?>
				</div>
			</div>
		</br>

		<div class = "row">
			<div class= "col-md-3 col-md-offset-1">
				<?php echo form_label("Password")?>
			</div>
			<div class= "col-md-4 col-md-offset-0">
				<?php echo form_input(array("id"=>"password", "name" => "password","type"=>"password", "class" => "form-control","value"=>set_value('password')))?>
				<?php echo form_error('password');?>
			</div>
		</div>
	</br>
	<div class = "row">
		<div class= "col-md-3 col-md-offset-1">
			<?php echo form_label("Confirm Password")?>
		</div>
		<div class= "col-md-4 col-md-offset-0">
			<?php echo form_input(array("id"=>"confirmpassword", "name" => "Confirm Password","type"=>"password", "class" => "form-control","value"=>set_value('confirmpassword')))?>
			<?php echo form_error('confirmpassword');?>
		</div>
	</div>
</br>
</div>

<div class = "row">
	<div class= "col-md-2 col-md-offset-4">
		<?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control'))?>
	</div>
	<div class= "col-md-2 col-md-offset-0">
		<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default btn-sm'))?>
	</div>
</div>
<?php echo form_close()?>
</div>
</div>



</section>
<!-- /.content -->
