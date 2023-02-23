<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Supplier
		<small>List</small>
		<?php echo anchor("/Supplier/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Supplier List</h3>
		</div>
		<div class="box-body">

			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="supplier">		
					<thead>
						<tr>
							<th>Supplier Name/සැපයුම්කරුගේ නම/வழங்குநர் பெயர்</th> 
							<th>Address/ලිපිනය/முகவரி</th>
							<th>NIC No/ජා.හැ.අංකය/தேசிய அடையாள அட்டை எண்</th> 
							<th>Phone No/දුරකථන අංකය/தொலைபேசி எண்</th>
							<th>Supply Items/සැපයුම් අයිතම/பொருட்களை வழங்குதல்</th>
							<th>Status</th>
							<th>Action</th>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($supplierList as $key => $supplier) {?>
						<tr>
							<td><?php echo $supplier->title.'&nbsp;.'.$supplier->firstname.'&nbsp;'.$supplier->lastname; ?></td>
							<td><?php echo $supplier->no.'&nbsp;,'.$supplier->lane.'&nbsp;,'.$supplier->city; ?></td>
							<td><?php echo $supplier->nicno; ?></td>
							<td><?php echo $supplier->phoneno; ?></td>
							<td><?php 
							foreach ($supplier->items as $key => $item) {?>
							<label class="label label-info"> <?php echo $item->item; ?></label>
							<?php } ?></td>
							<td>
								<input onchange="updateStatus(this, <?php echo $supplier->id ?>)" type="checkbox" data-size="mini" <?php if($supplier->status=='1') {echo 'checked';}?> data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
							</td>
							<td>
								<?php echo anchor("Supplier/Edit/".$supplier->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>   
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
	$('#supplier').DataTable();
});

function updateStatus (el, id) {
	var status = "0";
	if (el.checked) {
		status = "1";
	};
	window.location.href = "<?php echo base_url() ?>Supplier/update_status/"+id+"/"+status;
}
</script>
