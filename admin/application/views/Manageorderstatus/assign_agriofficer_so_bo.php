<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Assign Agriculture Officer to supplying buying order<small>create</small>
	</h1>

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
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Assign Agriculture Officer to supplying buying order Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">

			<!--form open from save function-->
			<?php echo form_open("Manageorderstatus/so_save")?>

			<!--location input feild-->
				<div class = "row">
					<input type="hidden" name="soid" id="soid" value="<?php echo $soid;?>">
						<div class="required col-md-2 col-md-offset-3">
							<?php echo form_label("Employee Name")?>
						</div>
						<div class="col-md-3 col-md-offset-0">
							<?php 

							$data = array(
								'id'=>'employee_id',
								'class'=>'form-control',
								'name'=>'employee_id',
								'required'=>'required');

							echo form_dropdown ('employee_id',$employeeList,set_value('employee_id'),$data);

							echo form_error('employee_id');?>
						</div>
					</div>
			<br>

				<div class = "row">

						<div class="required col-md-2 col-md-offset-3">
							<?php echo form_label("Vehicle")?>
						</div>
						<div class="col-md-3 col-md-offset-0">
							<?php 

							$data = array(
								'id'=>'vehicle_id',
								'class'=>'form-control',
								'name'=>'vehicle_id',
								'required'=>'required');

							echo form_dropdown ('vehicle_id',$vehicleList,set_value('vehicle_id'),$data);
							echo form_error('vehicle_id');?>
						</div>
					</div>
			<br>

			<div class = "row">
				<div class= "required col-md-2 col-md-offset-3">
					<?php echo form_label("Purchase Date")?>
				</div>
				<div class= "col-md-4 col-md-offset-0">
					<?php echo form_input(array("id"=>"purchase_date", "name" => "purchase_date", "class" => "form-control","type"=>"date",  "required'=>'required"))?>
					<?php echo form_error('purchase_date');?>
				</div>
			</div>
<br>
			<div class = "row">
				<div class= "required col-md-2 col-md-offset-3">
					<?php echo form_label("Distpatch Date")?>
				</div>
				<div class= "col-md-4 col-md-offset-0">
					<?php echo form_input(array("id"=>"dispatch_date", "name" => "dispatch_date", "class" => "form-control","type"=>"date", "required'=>'required"))?>
					<?php echo form_error('dispatch_date');?>
				</div>
			</div>
			
		</br>
		<!--butotns-->
		<div class = "row">
			<div class= "col-md-2 col-md-offset-5">
				<?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control  savebtn'))?>
			</div>
			<div class= "col-md-2 col-md-offset-0">
				<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default '))?>
			</div>
		</div>
		<!--form close-->
		<?php echo form_close()?>
	</div>
</div>



</section>
<!-- /.content -->

<script type="text/javascript">
	$(function(){
      
      $('#purchase_date').change(function(){
      	var purdate = $('#purchase_date').val();
      	var soid = $('#soid').val();
      	checkdates(purdate,soid);
      });

      $('#dispatch_date').change(function(){
      	var dpdate = $('#dispatch_date').val();
      	var soid = $('#soid').val();
      	checkdates(dpdate,soid);
      });



      function checkdates(chkdate,boid){
         $.ajax({
                                type: 'POST',
                                url:"<?php echo base_url('/manageorderstatus/check_so_dates');?>",
                                dataType: 'json',
                                //getbuyer by id
                                data:{'chkdate':chkdate,'soid':soid},
                                success: function(response){
                                	console.log(response);
                                   if(response==0){
                                    $('.savebtn').attr("disabled", true);
                                   }else{
                                   	$('.savebtn').attr("disabled", false);
                                   }        
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }
              });
      }

	});
</script>




