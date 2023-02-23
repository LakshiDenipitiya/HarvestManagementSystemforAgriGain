<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Vehicle
		<small>List</small>
		<?php echo anchor("/Vehicle/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Vehicle List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="vehicle">
					<thead>
						<tr>
							<th>Location/ස්ථානය/இடம்</th> 
							<th>Vehicle No/වාහන අංකය/வாகன எண்</th>
							<th>Name of the owner/අයිතිකරුගේ නම/உரிமையாளரின் பெயர்</th>
							<th>Status</th>
							<th>Action</th>
				
							
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($vehicleList as $key => $vehicle) {?>
				<tr>
					<td><?php echo $vehicle->location; ?></td>
					<td><?php echo $vehicle->vehicleno; ?></td>
					<td><?php echo $vehicle->ownername; ?></td>
					<td> <input onchange="updateStatus(this, <?php echo $vehicle->v_id ?>)" type="checkbox" data-size="mini" <?php if($vehicle->v_status=='1') {echo 'checked';}?> data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">

				
					<td>
						<?php echo anchor("Vehicle/Edit/".$vehicle->v_id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>   
					</td>
				<!--	<td>
						<?php echo anchor("Vehicle/Delete/".$vehicle->v_id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
					</td> -->
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
	$('#vehicle').DataTable();
});

function updateStatus (el,v_id) {
	var v_status = "0";
	if (el.checked) {
		v_status = "1";
	};
	window.location.href = "<?php echo base_url() ?>Vehicle/update_status/"+v_id+"/"+v_status;

}

</script>





