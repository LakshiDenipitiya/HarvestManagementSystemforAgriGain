<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">

		<div class="box-header with-border"><h3 align="center" class="box-title">
			
			 Customer Profile</h3>
		
		</div>
		<div class="box-body">
			<?php echo form_open('Login/view/'.$selectedUser->id) ?>
			<ul class="timeline">

				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="fa fa-user bg-yellow"></i>
					<div class="timeline-item">
						<h3 class="timeline-header" style="color:orange; bold;">General Details ...</h3>

						<div class="timeline-body">
							<div class = "row">
								<div class= "col-md-2 col-md-offset">
									<?php echo form_label("Customer Name")?>
								</div>
								<div class= "col-md-8 col-md-offset-0">
									<?php echo $selectedUser->title.'&nbsp;.'.$selectedUser->firstname.'&nbsp;'.$selectedUser->lastname; ?>
								</div>
							</div>	
						</br>
						<div class = "row">
							<div class= "col-md-2 col-md-offset">
								<?php echo form_label("NIC no")?>
							</div>
							<div class= "col-md-8 col-md-offset-0">
								<?php echo $selectedUser->nicno; ?>
							</div>
						</div>
					</br>

	
	</div>
</li>
<!-- END timeline item -->
<li>
	<i class="fa fa-motorcycle  bg-maroon"></i>
	<div class="timeline-item">
		<h3 class="timeline-header" style="color:red; bold;">Postal Details ...</h3>

		<div class="timeline-body">
			<div class = "row">
								<div class= "col-md-2 col-md-offset">
									<?php echo form_label("Address")?>
								</div>
								<div class= "col-md-8 col-md-offset-0">
									<?php echo $selectedUser->no.'&nbsp;.'.$selectedUser->lane.'&nbsp;'.$selectedUser->city; ?>
								</div>
							</div>	
		</br>
		
</div>	

</div>
</li>

<li>
	<i class="fa fa-commenting  bg-purple"></i>
	<div class="timeline-item">
		<h3 class="timeline-header" style="color:purple; bold;">Conatact Details ...</h3>

		<div class="timeline-body">
			
		<div class = "row">
			<div class= "col-md-2 col-md-offset">
				<?php echo form_label("Phone No")?>
			</div>
			<div class= "col-md-8 col-md-offset-0">
				<?php echo $selectedUser->phoneno; ?>
			</div>
		</div>	
	</br>
	<div class = "row">
		<div class= "col-md-2 col-md-offset">
			<?php echo form_label("Email")?>
		</div>
		<div class= "col-md-8 col-md-offset-0">
			<?php echo $selectedUser->email; ?>
		</div>
	</div>	
</br>
</div>	

</div>
</li>



</ul>


</div>
<?php echo form_close()?>
</div>

</section>
<!-- /.content -->

