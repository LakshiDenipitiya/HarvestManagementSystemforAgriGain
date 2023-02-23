<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Orders to be Assigned
		<small>List</small>
		
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
			<h3 class="box-title">Orders List</h3>
		</div>
		<div class="box-body">
			
				<?php echo form_open("Manageorder/selectordertype")?>
			<div class="table table-responsive">
		       <select name="type" required="required">
		       	<option value="">Select Order Type</option>
		       	<option value="1">Buying order</option>
		       	<option value="2">Supplying order</option>
		       </select>
		       <button type="submit" name="select_type"> 
		       	Select
		       </button>
		   	<?php echo form_close()?>
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








