<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AgriGain - Harvest Management System</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('asserts/bower_components/datatables/jquery.dataTables.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('asserts/bower_components/bootstrap-toggle-master/css/bootstrap-toggle.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('asserts/bower_components/select2/dist/css/select2.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('asserts/dist/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('asserts/bower_components/jquery-ui/themes/base/jquery-ui.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url('asserts/dist/css/font.css'); ?>">


  <!-- jQuery 3 -->
  <script src="<?php echo base_url('asserts/bower_components/jquery/dist/jquery-1.12.4.js') ?>"></script>

  <script src="<?php echo base_url('asserts/bower_components/jquery-ui/jquery-ui.js') ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('asserts/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- Data table -->
  <script src="<?php echo base_url('asserts/bower_components/datatables/jquery.dataTables.js') ?>"></script>

  <!-- Select 2 -->
  <script src="<?php echo base_url('asserts/bower_components/select2/dist/js/select2.min.js') ?>"></script>
  <script src="<?php echo base_url('asserts/sweet-alert/sweetalert.min.js') ?>"></script>
  <!--toggle-->
  <script src="<?php echo base_url('asserts/bower_components/bootstrap-toggle-master/js/bootstrap-toggle.min.js') ?>"></script>

  <?php
  $_BASE_URL = base_url();
  ?>

  <script type="text/javascript">

  var _BASE_URL = '<?php echo  base_url() ?>';
  </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header"  >
      <!-- Logo -->
      <a href="../../index2.html" class="logo" style="background-color:#254117">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini" style="font-family:fantasy">AgriGain</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg" style="font-family:fantasy; font-size:xx-large">AgriGain</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" style="background-color:#046307">

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav" >

           <!-- User Account: style can be found in dropdown.less -->
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('asserts/dist/img/img34c.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Welcome, '<?php echo $this->session->userdata('firstname')?>'</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background-color:#046307">
                <img src="<?php echo base_url('asserts/dist/img/img34c.png'); ?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $this->session->userdata("firstname");?>
               </p>
             </li>
             <!-- Menu Footer-->
             <li class="user-footer">
             <!--  <div class="pull-left">
                <a href="<?php echo base_url('employee/view'); ?>" class="btn btn-default btn-flat">Profile</a>
              </div> -->
              <div class="pull-right">
                <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar" style="background-color:#046307">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('asserts/dist/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p> Logged as <?php echo $this->session->userdata("firstname");?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>


       
         <li class="treeview">
            <a href="#">
              <i class="ion ion-social-buffer"></i>
              <span>Order Management</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('supplyingorder'); ?>"><i class="fa fa-circle-o"></i> Supply Order</a></li>
              <li><a href="<?php echo base_url('buyingorder'); ?>"><i class="fa fa-circle-o"></i> Buying order</a></li>
              <li class="treeview-menu"> 
                <i class="fa fa-angle-left pull-right"></i>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Manage Orders
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  
                   <li><a href="<?php echo base_url('manageorder'); ?>"><i class="fa fa-circle-o"></i> Orders to be assign</a></li>

                     <li class="treeview-menu"> 
                <i class="fa fa-angle-left pull-right"></i>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Assigned Orders
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    
                  <?php if($this->session->userdata('designation_id')=="3"){?>
                 <li><a href="<?php echo base_url('manageorderstatus/ready_to_purchased_bo_so'); ?>"><i class="fa fa-circle-o"></i> Assigned buying supplying orders</a></li>
         <?php   } else{?>
                       <li><a href="<?php echo base_url('manageorderstatus/create_advance_payment'); ?>"><i class="fa fa-circle-o"></i> Buying Order Status</a></li>
               <?php      }?>

 
                 <?php if($this->session->userdata('designation_id')=="3"){?>
                 <li><a href="<?php echo base_url('manageorderstatus/ready_to_purchased_so_bo
'); ?>"><i class="fa fa-circle-o"></i> Assigned supplying buying orders</a></li>
         <?php   } else{?>
                       <li><a href="<?php echo base_url('manageorderstatus/create_so_advance_payment'); ?>"><i class="fa fa-circle-o"></i> Supplying Order status</a>
               <?php      }?>

         
                       
                        
                    </li>

                 </ul>
                 
               </li>
             </li>


                 </ul>
                 
               </li>
             </li>
           </ul>
         </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Master Registrations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('buyer'); ?>"><i class="fa fa-circle-o"></i> Buyer</a></li>
            <li><a href="<?php echo base_url('Supplier'); ?>"><i class="fa fa-circle-o"></i> Supplier</a></li>
            <li><a href="<?php echo base_url('item'); ?>"><i class="fa fa-circle-o"></i> Item</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus-circle"></i>
            <span>Reference Registations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('location'); ?>"><i class="fa fa-circle-o"></i> Stock Location</a></li>
            <li><a href="<?php echo base_url('category'); ?>"><i class="fa fa-circle-o"></i> Item Category</a></li>
             <li><a href="<?php echo base_url('vehicle'); ?>"><i class="fa fa-circle-o"></i> Vehicle</a></li>
            
          <!--  <li class="treeview-menu">
              <i class="fa fa-angle-left pull-right"></i>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Services
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url(' '); ?>"><i class="fa fa-circle-o"></i> Service Type </a></li>
                  <li><a href="<?php echo base_url(' '); ?>"><i class="fa fa-circle-o"></i> Mechanical Type</a></li>
                </ul>
              </li>
            </li>-->
          </ul>
        </li>

<!-- 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(' '); ?>"><i class="fa fa-circle-o"></i> Services</a></li>
            <li><a href="<?php echo base_url(' '); ?>"><i class="fa fa-circle-o"></i> Sparepart selling</a></li>
          
          </ul>
        </li> -->

     <!--    <li>
          <a href="<?php echo base_url(' '); ?>">
            <i class="fa fa-th-list"></i> <span>Invoice</span>
          </a>
        </li>  -->

     <!--   <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('goodsreceivenotice'); ?>"><i class="fa fa-circle-o"></i> Goods Receive Notice</a></li>
            <li><a href="<?php echo base_url('invoice'); ?>"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="<?php echo base_url('stock'); ?>"><i class="fa fa-circle-o"></i>Stock</a></li> 
           <li><a href="<?php echo base_url('............'); ?>"><i class="fa fa-circle-o"></i> G.R.N. Settlement</a></li>
            <li><a href="<?php echo base_url('............'); ?>"><i class="fa fa-circle-o"></i> Update New Prices</a></li>
            <li><a href="<?php echo base_url('stock'); ?>"><i class="fa fa-circle-o"></i> Stock Adjustment</a></li> 
          </ul>
        </li> -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview-menu">
              <i class="fa fa-angle-left pull-right"></i>
              <li class="treeview">
              <!--  <a href="#"><i class="fa fa-circle-o"></i> Sales and Services
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a> -->
                <ul class="treeview-menu">
                  <li class="treeview">
                      <!-- <a href="#"><i class="fa fa-circle-o"></i> Invoice
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a> -->
                        <!-- <ul class="treeview-menu">
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Normal</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Without discount</a></li>
                        </ul> -->
                        <li>
                          <li class="treeview">
                     <!--  <a href="#"><i class="fa fa-circle-o"></i> Daily Sales Analysis
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Details</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Summary</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Invoice Summary</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Customer Summary</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Supplier wise slaes</a></li>
                        </ul> -->
                        <li>
                          <li><a href="<?php echo base_url(' '); ?>"><i class="fa fa-circle-o"></i> Service Type </a></li>
                          <li><a href="<?php echo base_url(' '); ?>"><i class="fa fa-circle-o"></i> Service Status </a></li> -->
                        
                        </ul>
                      </li>
                    </li>






            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Employee
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                          <li><a href="<?php echo base_url('Reportemployee'); ?>"><i class="fa fa-circle-o"></i> Employee List</a></li>
                        
                        </ul>
                      </li>
                   


                   <li class="treeview-menu">
                      <i class="fa fa-angle-left pull-right"></i>
                      <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Orders
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="<?php echo base_url('Reportsupplyorder'); ?>"><i class="fa fa-circle-o"></i> Supply order List</a></li>
                          <li><a href="<?php echo base_url('Reportadvancetobepaid'); ?>"><i class="fa fa-circle-o"></i>Advance t.b.p Buying orders</a></li>
                          <li><a href="<?php echo base_url('Reportsupplier'); ?>"><i class="fa fa-circle-o"></i>Supplier</a></li>
                        <!--                           <li><a href="<?php echo base_url(''); ?>"><i class="fa fa-circle-o"></i> Re-oder level Stock </a></li>
                         -->
                   <!--  <li><a href="<?php echo base_url('......'); ?>"><i class="fa fa-circle-o"></i> Goods Recieve Note</a></li>
                    <li><a href="<?php echo base_url('......'); ?>"><i class="fa fa-circle-o"></i> Godds Transfer Note</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> Closing Stock Report
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Catagory wise</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Location wise</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Supplier wise</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> All Stock</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('......'); ?>"><i class="fa fa-circle-o"></i> Non Moving Report </a></li>
                    <li><a href="<?php echo base_url('......'); ?>"><i class="fa fa-circle-o"></i> Re-order Report </a></li>
                    <li><a href="<?php echo base_url('......'); ?>"><i class="fa fa-circle-o"></i> Stock Adjustment </a></li>
                    <li><a href="<?php echo base_url('......'); ?>"><i class="fa fa-circle-o"></i> Bin Card </a></li>
                     <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> Supplier Purchase
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> Item wise</a></li>
                          <li><a href="<?php echo base_url('..........'); ?>"><i class="fa fa-circle-o"></i> G.R.N. wise</a></li>
                        </ul> -->
                      </li>
                    </ul>
                  </li>
                </li>
                
              <!-- <li class="treeview-menu">
              <i class="fa fa-angle-left pull-right"></i>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Accounting
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(' '); ?>"><i class="fa fa-circle-o"></i> Service Type </a></li>
                    <li><a href="<?php echo base_url(' '); ?>"><i class="fa fa-circle-o"></i> Mechanical Type</a></li>
                  </ul>
                </li>
              </li> -->


            </ul>
          </li>


         <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Administration</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('employee'); ?>"><i class="fa fa-circle-o"></i> Employee Registration</a></li>
              <li class="treeview-menu"> 
                <i class="fa fa-angle-left pull-right"></i>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> User Privilages
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                  
                   <li><a href="<?php echo base_url('module'); ?>"><i class="fa fa-circle-o"></i> Add new module</a></li>
                    <li><a href="<?php echo base_url('designation'); ?>"><i class="fa fa-circle-o"></i> Designation</a></li>

                 </ul>
                 
               </li>
             </li>
           </ul>
         </li>

        <!--  <li>
          <a href="<?php echo base_url(' '); ?>">
            <i class="fa fa-motorcycle"></i> <span></span>
          </a>
        </li> -->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <?php echo $subview; ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>AgriGain Harvest Management System .</strong> All rights reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- SlimScroll -->
<script src="<?php echo base_url('asserts/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('asserts/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asserts/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('asserts/dist/js/demo.js') ?>"></script>
<script>
$(document).ready(function () {
  $('.sidebar-menu').tree()
})
</script>
</body>
</html>
