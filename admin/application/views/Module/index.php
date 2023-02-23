<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Module
		<small>List</small>
		<?php echo anchor("/Module/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Module List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="module">
					<thead>
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($moduleList as $key => $module) {?>
						<tr>
							<td><?php echo $module->code; ?></td>
							<td><?php echo $module->name; ?></td>

							<td>
								<?php echo anchor("Module/Edit/".$module->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?> 
								<?php echo anchor("Module/Delete/".$module->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
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
	$('#module').DataTable();
});
</script>








