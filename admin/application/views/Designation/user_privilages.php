<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>

		Set User Privilages for <?php echo $designation_name->designation;?>
		
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
			
		</div>
		<div class="box-body">
			
			
			<div class="table table-responsive">
				<?php echo form_open("Designation/save_privilages")?>
				<table class="table table-bordered table-striped table-hover dataTable" id="module">
					<thead>
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php echo form_hidden('privid',$usertypeid); ?>
	                    <?php 
	                    
	                    if($moduleDbList){
	                    foreach($moduleDbList as $lnk){
	                      if(in_array($lnk->id,$user_privilages)){
	                    ?>
	                    <tr>
	                      <td><?php echo $lnk->code; ?></td>
						  <td><?php echo $lnk->name; ?></td>
	                      <td>	<?php $data=array('class'=>'form-check-input','id'=>'exampleCheck1', 'name'=>'chk[]','value'=>$lnk->id,'checked'=>'checked');
							echo form_checkbox($data);?>
			           		</td>
	                    </tr> 
	                    <?php 
	                       }else{
	                        ?>
	                    <tr>
	                      <td><?php echo $lnk->code; ?></td>
						  <td><?php echo $lnk->name; ?></td>
	                      <td><?php $data=array('class'=>'form-check-input','id'=>'exampleCheck1', 'name'=>'chk[]','value'=>$lnk->id);
								echo form_checkbox($data);?>
	                      </td>
	                    </tr>
	                        <?php
	                       }
	                     }
	                    }
	                    ?>
										
					</tbody>

					<tfooter>
						<tr>
								<div class= "col-md-2 col-md-offset-10">
									<?php echo form_submit(array('value' => 'Set Privilages','class'=>'btn btn-success form-control'))?>
								</div>  
						
						</tr>
					</tfooter>
				</table>
				<?php echo form_close()?>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->

<script type="text/javascript">
$(document).ready(function(){
	//$('#module').DataTable();
});
</script>








