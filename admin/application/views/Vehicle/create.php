<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle
		<small>create</small>
	</h1>

	<script type="text/javascript">

	$(document).ready(function(){

            //using select2 dropdown
            $("#location_id").select2();

            
        });//end of the document.ready function
	</script>

	<style>
	.required:after {
		content:" *";
		position: relative;
		top: 0;
		right: -1px;
		color: red;

	}
	</style>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-default">

		
		<div class="box-header with-border"><h3 align="center" class="box-title">Vehicle Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">
			<?php echo form_open("Vehicle/save")?>

					<div class = "row">

						<div class="required col-md-2 col-md-offset-3">
							<?php echo form_label("Location/ස්ථානය/இடம்")?>
						</div>
						<div class="col-md-3 col-md-offset-0">
							<?php 

							$data = array(
								'id'=>'location_id',
								'class'=>'form-control',
								'name'=>'location');

							echo form_dropdown ('location_id',$locationList,set_value('location_id'),$data);
							echo form_error('location_id');?>
						</div>
					</div>
					<br>	
					<div class = "row">
						<div class="required col-md-2 col-md-offset-3">
							<?php echo form_label("Vehicle No/වාහන අංකය/வாகன எண்")?>
						</div>
						<div class="col-md-3 col-md-offset-0">
							<?php echo form_input(array("id"=>"vehicleno", "name" => "vehicleno", "class" => "form-control","value"=>set_value('vehicleno')))?>
							<?php echo form_error('vehicleno');?>
						</div>
						
					</div>
					<br>
					<div class = "row">	
						<div class="required col-md-2 col-md-offset-3">
						<?php echo form_label("Name of the owner/අයිතිකරුගේ නම/உரிமையாளரின் பெயர்")?>
						</div>
						<div class="col-md-3 col-md-offset-0">
							<?php echo form_input(array("id"=>"ownername", "name" => "ownername", "class" => "form-control","value"=>set_value('ownername')))?>
							<?php echo form_error('ownername');?>
						</div>
					</div>
					<br>


			<div class = "row">
				<div class= "col-md-2 col-md-offset-4">
					<?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control'))?>
				</div>
				<div class= "col-md-2 col-md-offset-0">
					<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default btn-sm'))?>
				</div>
			</div>
			</form>
		</div>
	</div>

</section>
<!-- /.content -->
