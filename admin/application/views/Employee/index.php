<style type="text/css">
.resigned td:nth-child(-n+7) {
	opacity: 0.5;
}
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Employee
		<small>List</small>
		<?php echo anchor("/Employee/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
	</h1>

</section>


<!-- Main content -->
<section class="content">

	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>

	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>

	<?php } ?>


	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Employee List</h3>
		</div>
		<div class="box-body">

			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="employee" >		
					<thead>
						<tr>
							<th>Title</th> 
							<th>Employee Name</th> 
							<th>NIC No</th>
							<th>Phone No</th>
							<!-- <th>Status</th> -->
							<th>Designation</th>
							<th>Location</th>
							<th>Date of Recruitment</th>
							<th>Status</th> 
							<th>Action</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($employeeList as $key => $employee) {?>

						<?php 
						$is_resigned = false;

						if($employee->dateofresigned != NULL) {
							$is_resigned = true;
						} 

						?>

						<tr class="<?php if($is_resigned) echo "resigned" ?>">
							<td><?php echo $employee->title; ?></td>
							<td><?php echo $employee->firstname.'&nbsp;'.$employee->lastname; ?></td>
							<td><?php echo $employee->nicno; ?></td>
							<td><?php echo $employee->phoneno; ?></td>
							<td><?php echo $employee->designation; ?></td>
							<td><?php echo $employee->location; ?></td>
							<td><?php echo $employee->dateofrecruitment; ?></td>


							<td> <input <?php if($is_resigned) echo 'disabled'; ?> onchange="updateLeave(this, <?php echo $employee->empid ?>)" type="checkbox" data-size="mini" <?php if($employee->leavestatus=='work') {echo 'checked';}?> data-toggle="toggle" data-on="At Work" data-off="On Leave" data-onstyle="success" data-offstyle="danger">
							</td>
							
							<td>
								<?php echo anchor("Employee/Edit/".$employee->empid,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-xs btn-primary ')))?>  </td>
								
							<td>	<?php echo anchor("Employee/Delete/".$employee->empid,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-xs btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
								</td>
							<td>	<?php echo anchor("Employee/view/".$employee->empid,'<span class="fa fa-eye"> view</span>',(array('class'=>'btn btn-xs btn-info ')))?> 
								
							</td>
						</tr>

						<!-- <li><?php echo $key . " : " .$supplier->name; ?></li> -->
						<?php }?>

					</tbody>
				</table>

			</div>
		</div>

	</div>
</section>
<!-- /.content -->

<script type="text/javascript">
$(document).ready(function(){
	$('#employee').DataTable();
});

function updateLeave (el, empId) {
	var status = "leave";
	if (el.checked) {
		status = "work";
	};
	window.location.href = "<?php echo base_url() ?>Employee/update_leave/"+empId+"/"+status;
}
</script>
