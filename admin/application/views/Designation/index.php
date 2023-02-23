<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Designation
		<small>List</small>
		<?php echo anchor("/Designation/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Designation List</h3>
		</div>
		<div class="box-body">

			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="designation">
					<thead>
						<tr>
							<th>Designation</th> 
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($designationList as $key => $designation) {?>
						<tr>
							<td><?php echo $designation->designation; ?></td>

							<td>
								<?php echo anchor("Designation/Edit/".$designation->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>  
								<?php echo anchor("Designation/Delete/".$designation->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
								<?php echo anchor("Designation/set_privlages/".$designation->id,'<span class="fa fa-edit"> Set Privilages</span>',(array('class'=>'btn btn-warning ')))?> 
								  

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
	$('#designation').DataTable();
});
</script>









