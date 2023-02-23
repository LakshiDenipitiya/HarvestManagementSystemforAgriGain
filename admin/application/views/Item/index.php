<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Item
		<small>List</small>
		<?php echo anchor("/Item/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Item List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="item">
					<thead>
						<tr>
							<th>Category</th>
							<th>Code</th> 
							<th>Item Name</th>
							<th>Image of Item</th>
							<th>Buying Price (Rs.)</th>
							<th>Selling Price (Rs.)</th>
							<th>Status</th>
							<th>Action</th>
							<th></th>
							<th></th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($itemList as $key => $item) {?>
				<tr>
					<td><?php echo $item->category; ?></td>
					<td><?php echo $item->i_code; ?></td>
					<td><?php echo $item->item; ?></td>
					<td><?php echo $item->itemimage; ?></td>
					<td><?php echo $item->buyingprice; ?></td>
					<td><?php echo $item->sellingprice; ?></td>
					<td> <input onchange="updateStatus(this, <?php echo $item->i_id ?>)" type="checkbox" data-size="mini" <?php if($item->i_status=='active') {echo 'checked';}?> data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger">
								</td>

				
					<td>
						<?php echo anchor("Item/Edit/".$item->i_id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>   
					</td>
					<td>
						<?php echo anchor("Item/Delete/".$item->i_id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
					</td>
					<td>
					<?php echo anchor("Item/view/".$item->i_id,'<span class="fa fa-eye"> view</span>',(array('class'=>'btn btn-info ')))?> 
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
	$('#item').DataTable();
});

function updateStatus (el,i_id) {
	var status = "deactive";
	if (el.checked) {
		status = "active";
	};
	window.location.href = "<?php echo base_url() ?>Item/update_status/"+i_id+"/"+status;

}

</script>





