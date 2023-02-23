<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <style>
  body, html {
    height: 100%;
    margin: 0;
  }

  .bg {
    /* The image used */
    background-image: url("<?php echo base_url('asserts/dist/img/login3.jpg');?>");
    

    /* Full height */
    height: 25%; 

    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
  }


  .login-box{
    background-color:rgb(138,217,142); /* fallback for IE 8 and below */
    background-color:rgba(138,217,142,0.8)
  }
  div.login-box-body{
    background-color:rgb(255,255,255); /* fallback for IE 8 and below */
    background-color:rgba(255,255,255,0)
  }
  p,b{
    color:black;

  }
  .success{
    color:#9F000F;
    font-size: 14pt;
    font-weight: bold;
    font-style:italic;
  }
  .checkbox{
   color:black;
 }
 .iCheck-helper{
  border-color: rgb(0,0,0);
}
.has-feedback{
  opacity:1;
}


</style>

<title>AgriGain | Login</title>


<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('asserts/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('asserts/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url('asserts/bower_components/Ionicons/css/ionicons.min.css'); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('asserts/dist/css/AdminLTE.min.css'); ?>">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url('asserts/plugins/iCheck/square/blue.css'); ?>">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  
</head>
<body class="bg">

  <div class="login-box">
    <div class="login-logo">
      <b style="font-family:fantasy; font-size:larger">AgriGain</b> 
      <p style="font-family: initial; font-size:xx-large; color:#290b04;"> Harvest Management System</p>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg" style="font-size:18pt; color:#061127; ">Please Sign In</p>

      <?php echo form_open('Login/Auth');?>
      <div class="form-group has-feedback">
        <?php echo form_input(array("name" => "username","class"=>"form-control","placeholder"=>"Username", "value" => set_value("username")));?>
        <span style="background-color:#d2d6de" class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo form_error("username");?>
      </div>
      <div class="form-group has-feedback" >
        <?php echo form_input(array("type"=> "password","name" =>"password","class"=>"form-control","placeholder"=>"Password", "value"=>set_value("password")));?>
        <span style="background-color:#d2d6de" class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error("password");?>
      </div>


      <?php if($this->session->flashdata("error_message")){ ?>

      <p class="success">
        <?php echo $this->session->flashdata("error_message");?>
      </p>

      <?php } ?>
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
            <label class="form-check-label" for="autoSizingCheck2">
             Remember me
           </label>
         </div>
       </div>
     </div>
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
     <!-- <hr>
      <div class="row">
        <div class="col-xs-6">
   
        </div>
        <div class="col-xs-6">
          <a href="<?php echo base_url('....'); ?>" class="btn btn-info">I forget My Password</a>
        </div>
      </div>  -->
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('asserts/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('asserts/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('asserts/plugins/iCheck/icheck.min.js'); ?>"></script>
  <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  </script>
</div>

<!--/.background-img -->
</body>
</html>




















