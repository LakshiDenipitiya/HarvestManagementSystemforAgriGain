<!DOCTYPE HTML>
<html>
<head>
  <title>AgriGain</title>

  <link rel="stylesheet" href="<?php echo base_url('assertsN/css/maxcdn.css'); ?>">
  <script src="<?php echo base_url('assertsN/css/jquerycarousal.css'); ?>"></script>
  <script src="<?php echo base_url('assertsN/css/maxcdnboots2.css'); ?>"></script>



  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assertsN/css/bootstrap.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assertsN/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assertsN/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assertsN/bower_components/datatables/jquery.dataTables.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assertsN/bower_components/select2/dist/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assertsN/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel='stylesheet' type='text/css' href="<?php echo base_url('assertsN/css/font.css'); ?>">
  <link rel='stylesheet' type='text/css' href="<?php echo base_url('assertsN/css/font2.css'); ?>">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->
<script src="<?php echo base_url('assertsN/js/jquery.min.js') ?>"></script>

<script src="<?php echo base_url('assertsN/bower_components/jquery/dist/jquery-1.12.4.js') ?>"></script>

<script src="<?php echo base_url('assertsN/bower_components/jquery-ui/jquery-ui.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assertsN/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Data table -->
<script src="<?php echo base_url('assertsN/bower_components/datatables/jquery.dataTables.js') ?>"></script>

<!-- Select 2 -->
<script src="<?php echo base_url('assertsN/bower_components/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assertsN/sweet-alert/sweetalert.min.js') ?>"></script>
<!--toggle-->
<script src="<?php echo base_url('assertsN/bower_components/bootstrap-toggle-master/js/bootstrap-toggle.min.js') ?>"></script>

<script type="text/javascript">
  jQuery(document).ready(function($) {

    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
    });
  });
</script>
<!-- grid-slider -->
<script type="text/javascript" src="<?php echo base_url('assertsN/js/jquery.mousewheel.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assertsN/js/jquery.contentcarousel.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assertsN/js/jquery.easing.1.3.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assertsN/js/bootstrap.js') ?>"></script>
<!-- //grid-slider -->

</head>
<body>

  <!-- start menu -->
  <div class="menu" id="menu" style="background-color:#0f8013">
    <div class="container" style="width: -webkit-fill-available;">
     <div class="logo">
      <a href="/agrigain/index.php/Web/aboutUs">
        <div style="display: inline-flex;">
        <img src="<?php echo base_url('assertsN/images/nameagrigain.jpg'); ?>" alt=" "></a>
        <?php if($this->session->userdata('type')=="supplier"){?>
        <p style="color: white; font-style: italic; margin-top: 10%">Supplier</p>
     <?php }else if ($this->session->userdata('type')=="buyer"){ ?>
        <p style="color: white; font-style: italic; margin-top: 10%;">Buyer</p>
    <?php  }?>
  </div>
      </div>


      <div class="h_menu4"><!-- start h_menu4 -->
       <a class="toggleMenu" href="#">Menu</a>
       <ul class="nav">
        <li><a href="<?php echo base_url('index.php/web/index'); ?>">Home</a></li>
        <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
        <li><a href="<?php echo base_url('index.php/web/indexlog'); ?>">Dashboard</a></li>
      <?php endif ?>

      <li><a href="<?php echo base_url('index.php/Web/aboutUs'); ?>">About</a></li>
 
     <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')){
          if($this->session->userdata('type')=="supplier"){     
      ?>

       <li><a href="<?php echo base_url('index.php/supplyingorder/create'); ?>">Place Supplying Order</a></li>
     <?php
      }else{
        ?>
       <li><a href="<?php echo base_url('index.php/buyingorder/create'); ?>">Place Buying Order</a></li>
        <?php
      }
     }
     ?>


   <!--  <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
      

            
      <li><a href="<?php echo base_url('index.php/Buyingorder'); ?>">Place Order</a></li>
    <?php endif ?> -->



<li><a href="<?php echo base_url('index.php/Web/contactUs'); ?>">Contact</a></li>

<?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>

<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color:lightgreen;">
    <img src="<?php echo base_url('assertsN/images/img34c.png');?>" class="user-image" alt="User Image" style="width:30px" " height:30px";>
    <span class="hidden-xs " style="color:black;">Welcome, '<?php echo $this->session->userdata("username")?>'</span>
  </a>
  <ul class="dropdown-menu" style="background-color:lightgreen; width:230px">
    <!-- User image -->
    <li class="user-header">
      <img src="<?php echo base_url('assertsN/images/img34c.png');?>" class="img-circle" alt="User Image">

      <p>
       <?php echo $this->session->userdata("username");?>

     </p>
   </li>
   <!-- Menu Footer-->
   <li class="user-footer">
      <!-- <div class="pull-left">
        <a href="<?php echo base_url('index.php/web/custview'); ?>" class="btn btn-default btn-flat">Profile</a>
      </div> -->
      <div>
        <a href="<?php echo base_url('index.php/web/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>

      </div>
      <br>
      <div>
        <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')){
          if($this->session->userdata('type')=="supplier"){     
          ?>

           <a href="<?php echo base_url('index.php/supplier/view'); ?>" class="btn btn-default btn-flat">your Profile</a>
         <?php
          }else{
            ?>
           <a href="<?php echo base_url('index.php/buyer/view'); ?>" class="btn btn-default btn-flat">your Profile</a>
            <?php
          }
         }
         ?>

      </div>
    </li>
  </ul>

<?php else: ?>
 <li><a href="<?php echo base_url('index.php/Web/signup'); ?>">Sign Up</a></li>
 <li><a href="<?php echo base_url('index.php/Web/loginN'); ?>">Login</a></li>
<?php endif ?>


</ul>
<script type="text/javascript" src="<?php echo base_url('assertsN/js/nav.js') ?>"></script>
</div><!-- end h_menu4 -->






<!-- <div class="navbar-custom-menu box-tools pull-right">
  <ul class="nav navbar-nav" > -->

   <!-- User Account: style can be found in dropdown.less -->
 <!--   <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="<?php echo base_url('assertsN/images/img34c.png');?>" class="user-image" alt="User Image" style="width:30px"; "height:30px";>
      <span class="hidden-xs">Welcome, '<?php echo $this->session->userdata("username")?>'</span>
    </a>
    <ul class="dropdown-menu"> -->
      <!-- User image -->
   <!--    <li class="user-header">
        <img src="<?php echo base_url('assertsN/images/img34c.png');?>" class="img-circle" alt="User Image">

        <p>
         <?php echo $this->session->userdata("username");?>

       </p>
     </li> -->
     <!-- Menu Footer-->
  <!--    <li class="user-footer">
      <div class="pull-left">
        <a href="<?php echo base_url('index.php/web/custview'); ?>" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="<?php echo base_url('index.php/web/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>

      </div>
    </li>
  </ul>
</li>

</ul>
</div> -->




<div class="clear"></div>
</div>
</div>
<!-- end menu -->

<div>
  <?php echo $subview; ?>
</div>


<div class="footer-bottom" style="background-color:#0f8013">
 <div class="container" >
   <div class="row section group" >

    <div class="col-md-7">
      <div class="f-logo">
        <img src="<?php echo base_url('assertsN/images/nameagrigain.jpg'); ?>" alt=" "></a>
      </div>
      <p class="m_9">We provide best price of your harvest and provide best service for the buyers.</p>
      <div class="tablefooter">
        <table>
          <thead>
            <tr>
              <th>Colombo</th>
              <th>Anuradhapura</th>
              <th>Monaragala</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p class="address">Phone : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">0777 - 547346</span></p>
                <p class="address">Address : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">No 241,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Green Avenue,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Pamankada,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Colombo 06</span></p>
              </td>
              <td style="padding-right: 10px;">
                <p class="address">Phone : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">0787 - 547347</span></p>
                <p class="address">Address : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">No 15/B,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lotus Lane,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Anuradhapura</span></p>
              </td>
              <td>
                <p class="address">Phone : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">0787 - 547348</span></p>
                <p class="address">Address : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="m_10">No 134/B2,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Park Lane,</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Monaragala</span></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-4 col-md-offset-1">
      <ul class="list">
        <h4 class="m_7">Menu</h4>

        <li><a href="<?php echo base_url('index.php/web/index'); ?>">Home</a></li>
        <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
        <li><a href="<?php echo base_url('index.php/web/indexlog'); ?>">Dashboard</a></li>
      <?php endif ?>

      <li><a href="<?php echo base_url('index.php/Web/aboutUs'); ?>">About</a></li>

      <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>
      <li><a href="<?php echo base_url('index.php/buyingorder/create'); ?>">Place Order</a></li>
    <?php endif ?>
    

<li><a href="<?php echo base_url('index.php/Web/contactUs'); ?>">Contact</a></li>

<?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')): ?>

<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

    <span class="hidden-xs">Logged as, '<?php echo $this->session->userdata("username")?>'</span>
  </a>
</li>

<?php else: ?>
  <li><a href="<?php echo base_url('index.php/web/signup'); ?>">Sign Up</a></li>
  <li><a href="<?php echo base_url('index.php/Web/loginN'); ?>">Login</a></li>
<?php endif ?>

</ul>
</div>
<div class="clear"></div>
</div>
</div>
</div>
<div class="copyright">
  <div class="container">
    <div class="copy">
      <p></p>
    </div>
    <div class="social">  
      <h5 style="color:white">AgriGain Team</h5>
    </div>
    <div class="clear"></div>
  </div>
</div>
<!-- SlimScroll -->
<script src="<?php echo base_url('assertsN/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assertsN/bower_components/fastclick/lib/fastclick.js') ?>"></script>

</body>
</html>