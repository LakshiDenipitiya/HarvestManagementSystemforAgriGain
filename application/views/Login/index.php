<!-- Content Header (Page header) -->
    <section class="content-header">
<title>AgriGain | Login </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<style>
 .main{
 	background-image: url("<?php echo base_url('assertsN/images/img34.jpg');?>");
 	 /* Full height */
    height: 25%; 

    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 };

</style>
</section>
<!-- Main content -->
<section>


	<!-- Display success Message -->
	<?php if($this->session->flashdata("message")){ ?>
	
	<!--display sucess message-->
	<p class="success">
		<?php echo $this->session->flashdata("message");?>
	</p>
	
	<?php } ?>

	
<div class="main">
		<div class="login_top">
			<div class="container">
<div class=" col-md-6 col-md-offset-3">
 <?php if($this->session->flashdata("error_message")):?>
   <p class="alert alert-danger alert-dismissible">
     <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
     <?php echo $this->session->flashdata("error_message");?>
   </p>
 <?php endif; ?>
</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="login-page">
						<div class="login-title">
							<h4 class="title">Registered Customers</h4>
							<div id="loginbox" class="loginbox">
								<?php echo form_open('index.php/Web/auth');?>
								<div class="form-group has-feedback">
									<?php echo form_input(array("name" => "username","class"=>"form-control","placeholder"=>"Username", "value" => set_value("username")));?>
									<?php echo form_error("username");?>
								</div>
								<div class="form-group has-feedback" >
									<?php echo form_input(array("type"=> "password","name" =>"password","class"=>"form-control","placeholder"=>"Password", "value"=>set_value("password")));?>
									<?php echo form_error("password");?>
								</div>

							</br>
							<div class="row">
								<div class = "col-xs-6">
									<button type="submit" class="btn btn-block btn-primary  ">Sign In</button>
								</div>
								<!-- /.col -->
								<div class="col-xs-6">
									<button type="reset" class="btn btn-block btn-default">Clear</button>
								</div>
								<!-- /.col -->
							</div>
							<?php echo form_close();?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
</section>


























<!-- <section class="content">

   
       <div class="main">
          <div class="login_top">
          	<div class="container">
          		
				<div class="col-md-6 col-md-offset-3">
				 <div class="login-page">
				  <div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					<div id="loginbox" class="loginbox">
						<form action="Auth" method="post" name="login" id="login-form">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Username</label>
						      <input id="modlgn_username" type="text" name="email" class="inputbox" size="18" autocomplete="off">
						      <?php echo form_error("email");?>
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
						      <?php echo form_error("password");?>
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" id='submit' name="Submit" class="button" value="Login"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					</div>
			      </div>
				</div>
				<div class="clear"></div>
			  </div>
			</div>
		  </div>
         </div>
</section>
<script type="text/javascript">
	$("form").submit(function(e){
		e.preventDefault(); 
		var valied_status=true;
		if($("#modlgn_username").val() =="" || $("#modlgn_username").val()==null ){
			alert("Username is required");
		}
		if($("#modlgn_passwd").val() =="" || $("#modlgn_passwd").val()==null ){
			alert("Password is required");

		}
		$.ajax({
            type: "POST",
            url: 'auth',
            data: $('form').serialize(),
            success: function (data) {
            	var obj=$.parseJSON(data);
            	if(obj.status){
            		window.location.href = 'index';
            	}else{
            		alert(obj.msg);
            	}
                // swal("success", {
                //         icon: "success",
                //     });
                // location.reload();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                // swal(errorThrown, {
                //         icon: "fail",
                //     });
            }
        });
	});
</script> -->