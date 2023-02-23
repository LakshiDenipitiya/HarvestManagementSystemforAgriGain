<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Item
		<small>View</small>
	</h1>
</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">

		<div class="box-header with-border"><h3 align="center" class="box-title">
			<a href="<?php echo base_url() ?>/item">
				<button class="btn btn-primary btn-sm">Go back</button>
			</a> Item Profile</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">
			<?php echo form_open('Item/view/'.$selectedUser->i_id) ?>
			<ul class="timeline">

				<!-- timeline item -->
				<li>
					<!-- timeline icon -->
					<i class="fa fa-user bg-yellow"></i>
					<div class="timeline-item">
						<h3 class="timeline-header" style="color:orange; bold;">Item Details ...</h3>

						<div class="timeline-body">
							<div class = "row">
								<div class= "col-md-2 col-md-offset">
									<?php echo form_label("Category of Item")?>
								</div>
								<div class= "col-md-8 col-md-offset-0">
									<?php echo $selectedUser->category; ?>
								</div>
							</div>	
						</br>
						<div class = "row">
							<div class= "col-md-2 col-md-offset">
								<?php echo form_label("Code")?>
							</div>
							<div class= "col-md-8 col-md-offset-0">
								<?php echo $selectedUser->code; ?>
							</div>
						</div>
					</br>
					<div class = "row">
						<div class= "col-md-2 col-md-offset">
							<?php echo form_label("Item Name")?>
						</div>
						<div class= "col-md-8 col-md-offset-0">
							<?php echo $selectedUser->item; ?>
						</div>
					</div>
				</br>
				<div class = "row">
					<div class= "col-md-2 col-md-offset">
						<?php echo form_label("Image of Item")?>
					</div>
					<div class= "col-md-8 col-md-offset-0">
						<?php echo $selectedUser->itemimage; ?>
					</div>
				</div>
		</br>
	</div>
</li>
<!-- END timeline item -->
<li>
	<i class="fa fa-commenting  bg-purple"></i>
	<div class="timeline-item">
		<h3 class="timeline-header" style="color:purple; bold;">Pricing Details per 1<?php echo $selectedUser->unit; ?> ...</h3>

		<div class="timeline-body">
			<div class = "row">
				<div class= "col-md-2 col-md-offset">
					<?php echo form_label("Buying Price")?>
				</div>
				<div class= "col-md-8 col-md-offset-0">
					<?php echo $selectedUser->buyingprice; ?>
				</div>
			</div>	
		</br>
		<div class = "row">
			<div class= "col-md-2 col-md-offset">
				<?php echo form_label("Selling Price")?>
			</div>
			<div class= "col-md-8 col-md-offset-0">
				<?php echo $selectedUser->sellingprice; ?>
			</div>
		</div>	
	</br>
	

</div>	

</li>


</ul>


</div>
<?php echo form_close()?>
</div>

</section>
<!-- /.content -->

