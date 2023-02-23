<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Stakeholder
		<small>List</small>
		<?php echo anchor("/Stakeholder/create", "Create",array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Stakeholder List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-hover dataTable" id="stakeholder">
					<thead>
						<tr>
							<th>Name of the Employee</th> 
							<th>Username</th>
							<th>Password</th> 
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($stakeholderList as $key => $stakeholder) {?>
						<tr>
							<td><?php echo $stakeholder->employee_id; ?></td>
							<td><?php echo $stakeholder->username; ?></td>
							<td><?php echo $stakeholder->password; ?></td>
							
							<td>
								<?php echo anchor("stakeholder/Edit/".$stakeholder->id,"Edit",(array('class'=>'btn btn-primary ')))?> | 
								<?php echo anchor("stakeholder/Delete/".$stakeholder->id,"Delete", array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
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
	$('#stakeholder').DataTable();
});
</script>
