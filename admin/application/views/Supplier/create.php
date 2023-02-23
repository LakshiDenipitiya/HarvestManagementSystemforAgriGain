<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Supplier
		<small>create</small>
	</h1>
	<style>
	.required:after {
		content:" *";
		position: relative;
		top: 0;
		right: -1px;
		color: red;

	}
	</style> 

<script type="text/javascript" >
	$(document).ready(function(){

            //using select2 dropdown
            $("#item_i_id").select2();
            
        });
	</script>

</section>

<!-- Main content -->
<section class="content">


	<div class="box box-default">
		
		<div class="box-header with-border"><h3 align="center" class="box-title">Supplier Registration Form</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<div class="box-body">

			<?php echo form_open("Supplier/save")?>
			<div class= "form-group">
				<fieldset class="col-md-8 col-md-offset-2">    	
					<legend>General Information/සාමාන්‍ය තොරතුරු/பொதுவான செய்தி</legend>

					<div class = "row">
						<div class= "required col-md-3 col-md-offset-2">
							<?php echo form_label("Title")?>
						</div>
						<div class= "col-md-3">
							<?php
							$options=array(
								''=>'Select',
								'Mr'=>'Mr',
								'Mrs'=>'Mrs',
								'Ms'=>'Ms',);
							$data=array(
								'id'=>'title',
								'class'=>'form-control',
								'name'=>'title');	

							echo form_dropdown('title',$titleDropdownOption,set_value('title'),$data);
							echo form_error('title');?>
						</div>
					</div>
				</br>

				<div class = "row">
					<div class= "required col-md-3 col-md-offset-2">
						<?php echo form_label("First Name/මුල් නම/முதல் பெயர்")?>
					</div>
					<div class= "col-md-5 col-md-offset-0">
						<?php echo form_input(array("id"=>"firstname", "name" => "firstname", "class" => "form-control","value"=>set_value('firstname')))?>
						<?php echo form_error('firstname');?>
					</div>
				</div>
			</br>

			<div class = "row">
				<div class= "required col-md-3 col-md-offset-2">
					<?php echo form_label("Last Name/වාසගම/குடும்ப பெயர்")?>
				</div>
				<div class= "col-md-5 col-md-offset-0">
					<?php echo form_input(array("id"=>"lastname", "name" => "lastname", "class" => "form-control","value"=>set_value('lastname')))?>
					<?php echo form_error('lastname');?>
				</div>
			</div>
		</br>

		<div class = "row">
			<div class= "required col-md-3 col-md-offset-2">
				<?php echo form_label("NIC No/ජා.හැ.අංකය/தேசிய அடையாள அட்டை எண்")?>
			</div>
			<div class= "col-md-5 col-md-offset-0">
				<?php echo form_input(array("id"=>"nicno", "name" => "nicno", "class" => "form-control", "type" => "text","value"=>set_value('nicno')))?>
				<?php echo form_error('nicno');?>
			</div>
		</div>

	</fieldset>
</div>
</br>

<div class= "form-group">
	<fieldset class="col-md-8 col-md-offset-2">    	
		<legend>Postal Information/තැපැල් තොරතුරු/அஞ்சல் தகவல்</legend>

		<div class = "row">
			<div class= "required col-md-3 col-md-offset-2">
				<?php echo form_label("No/අංකය/எண்")?>
			</div>
			<div class= "col-md-3 col-md-offset-0">	
				<?php echo form_input(array("id"=>"no", "name" => "no", "class" => "form-control", "type" => "text","value"=>set_value('no')))?>
				<?php echo form_error('no');?>
			</div>
		</div>	
	</br>
	<div class = "row">
		<div class= "required col-md-3 col-md-offset-2">
			<?php echo form_label("Lane/වීදිය/தெரு")?>
		</div>
		<div class= "col-md-5 col-md-offset-0">		
			<?php echo form_input(array("id"=>"lane", "name" => "lane", "class" => "form-control","value"=>set_value('lane')))?>
			<?php echo form_error('lane');?>
		</div>
	</div>	
</br>
<div class = "row">
	<div class= "required col-md-3 col-md-offset-2">
		<?php echo form_label("City/නගරය/நகரம்")?>
	</div>
	<div class= "col-md-5 col-md-offset-0">			
		<?php echo form_input(array("id"=>"city", "name" => "city", "class" => "form-control","value"=>set_value('city')))?>
		<?php echo form_error('city');?>
	</div>
</div>

</fieldset>
</div>	
</br>

<div class= "form-group">
	<fieldset class="col-md-8 col-md-offset-2">    	
		<legend>Contact Information/සම්බන්ධීකරණ තොරතුරු/தொடர்பு தகவல்</legend>

		<div class = "row">
			<div class= "required col-md-3 col-md-offset-2">
				<?php echo form_label("Phone No/දුරකථන අංකය/தொலைபேசி எண்")?>
			</div>
			<div class= "col-md-5 col-md-offset-0">	
				<?php echo form_input(array("id"=>"phoneno", "name" => "phoneno", "class" => "form-control", "type" => "text","value"=>set_value('phoneno')))?>
				<?php echo form_error('phoneno');?>
			</div>
		</div>
	</br>

	<div class = "row">
		<div class= "required col-md-3 col-md-offset-2">
			<?php echo form_label("Email/ඊ-මේල්/மின்னஞ்சல் முகவரி")?>
		</div>
		<div class= "col-md-5 col-md-offset-0">	
			<?php echo form_input(array("id"=>"email", "name" => "email", "class" => "form-control", "type" => "email","value"=>set_value('email')))?>
			<?php echo form_error('email');?>
		</div>
	</div>
</br>

</fieldset>
</div>

<div class= "form-group">
	<fieldset class="col-md-8 col-md-offset-2">    	
		<legend>Supply Items/සැපයුම් අයිතම/பொருட்களை வழங்குதல்</legend>

	<div class = "row">
			<div class= "required col-md-3 col-md-offset-2">
			<?php echo form_label("Items you wish to supply/ඔබ සැපයීමට බලාපොරොත්තු වන භාණ්ඩ/நீங்கள் வழங்க விரும்பும் பொருட்கள்")?>
		</div>
			<div class= "col-md-4 col-md-offset-0">	
				<?php 

				$data = array(
					'id'=>'item_i_id',
					'class'=>'form-control',
					'name'=>'item');

				echo form_multiselect('item_i_id[]',$itemList,set_value('item_i_id'),$data);
				echo form_error('item_i_id');?>
			</div>
			<div class= "col-md-3 col-md-offset-0">	

				<a href="<?php echo base_url('item/create'); ?>" class="btn btn-info">Add New</a>

			</div>

		</div>

</br>

</fieldset>
</div>


<div class = "row">
	<div class= "col-md-2 col-md-offset-4">
		<?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control'))?>
	</div>
	<div class= "col-md-2 col-md-offset-0">
		<?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default btn-sm'))?>
	</div>
</div>
<?php echo form_close()?>
</div>
</div>



</section>
<!-- /.content -->
