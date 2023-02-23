<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Category
		<small>List</small>
		<?php echo anchor("/Category/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Category List</h3>
		</div>
		<div class="box-body">
			
			
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="category">
					<thead>
						<tr>
							<th>Id</th> 
							<th>Code/කේතය/குறியீடு</th>
							<th>Category/වර්ගය/வகை</th>
							<th>Unit/ඒකකය/அலகு</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($categoryList as $key => $category) {?>
						<tr>
							<td><?php echo $category->id; ?></td>
							<td><?php echo $category->code; ?></td>
							<td><?php echo $category->category; ?></td>
							<td><?php echo $category->unit; ?></td>
							<td>
								<?php echo anchor("Category/Edit/".$category->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary ')))?>  
								<?php echo anchor("Category/Delete/".$category->id,'<span class="fa fa-remove"> Delete</span>', array('class' => 'btn btn-danger ','onclick' => "return confirm('Are you sure?')"));?>
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
	$('#category').DataTable();
});
</script>
