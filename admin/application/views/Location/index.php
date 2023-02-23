<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Location
		<small>List</small>
		<?php echo anchor("/Location/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
	</h1>
</section>


<!-- Main content -->
<section class="content">

	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>
	
	<!--display sucess message-->
	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>
	
	<?php } ?>

	
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Location List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="location">
					<thead>
						<tr>
							<th>Code/කේතය/குறியீடு</th>
							<th>Location/ස්ථානය/இடம்</th> 
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<!--get color list as array-->
						<?php foreach ($locationList as $key => $location) {?>
						<tr>
							<td><?php echo $location->code; ?></td>
							<td><?php echo $location->location; ?></td>

							<td>
								<!--buttons-->
								<?php echo anchor("Location/Edit/".$location->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?> 
								<?php echo anchor("Location/Delete/".$location->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
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

<!--data table load-->
<script type="text/javascript">
$(document).ready(function(){
	$('#location').DataTable();
});
</script>








