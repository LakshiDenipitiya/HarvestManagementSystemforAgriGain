<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Buyer
		<small>List</small>
		<?php echo anchor("/Buyer/create", '<span class="fa fa-files-o"> Create</span>',array('class' => 'btn btn-primary pull-right'));?>
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
			<h3 class="box-title">Buyer List</h3>
		</div>
		<div class="box-body">

			<div class="table table-responsive">
				<table class="table table-bordered table-striped table-hover dataTable" id="buyer">		
					<thead>
						<tr>
							<th>Buyer Name/ ගැනුම්කරුගේ නම/ வாங்குபவரின் பெயர்</th> 
							<th>Address/ ලිපිනය/ முகவரி</th>
							<th>NIC No/ ජා.හැ.අංකය/ தேசிய அடையாள அட்டை எண்</th> 
							<th>Phone No/ දුරකථන අංකය/ தொலைபேசி எண்</th>
							<th>Supply Items/ සැපයුම් අයිතම/ பொருட்களை வழங்குதல்</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($buyerList as $key => $buyer) {?>
						<tr>
							<td><?php echo $buyer->title.'&nbsp;.'.$buyer->firstname.'&nbsp;'.$buyer->lastname; ?></td>
							<td><?php echo $buyer->no.'&nbsp;,'.$buyer->lane.'&nbsp;,'.$buyer->city; ?></td>
							<td><?php echo $buyer->nicno; ?></td>
							<td><?php echo $buyer->phoneno; ?></td>
							<td><?php 
							foreach ($buyer->items as $key => $item) {?>
							<label class="label label-info"> <?php echo $item->item; ?></label>
							<?php } ?></td>
							
								<td>
									<input onchange="updateStatus(this, <?php echo $buyer->id ?>)" type="checkbox" data-size="mini" <?php if($buyer->status=='1') {echo 'checked';}?> data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
					<!--		
								<?php 
                                if($buyer->status==1){
                                	echo anchor("Buyer/changestatus/".$buyer->id."/0",'<span class="fa fa-remove"> Inactive this</span>', array('class' => 'btn btn-danger btn-sm ','onclick' => "return confirm('Are you sure?')"));
                                }else{
                                	echo anchor("Buyer/changestatus/".$buyer->id."/1",'<span class="fa fa-remove"> Active this</span>', array('class' => 'btn btn-success btn-sm ','onclick' => "return confirm('Are you sure?')"));
                                }
								

								?> -->

							</td>
							<td>
								<?php echo anchor("Buyer/Edit/".$buyer->id,'<span class="fa fa-edit"> Edit</span>',(array('class'=>'btn btn-primary btn-sm ')))?>   
							</td>
						</tr>

						<!-- <li><?php echo $key . " : " .$buyer->name; ?></li> -->
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
	$('#buyer').DataTable();
});

function updateStatus (el, id) {
	var status = "0";
	if (el.checked) {
		status = "1";
	};
	window.location.href = "<?php echo base_url() ?>Buyer/update_status/"+id+"/"+status;
}
</script>
