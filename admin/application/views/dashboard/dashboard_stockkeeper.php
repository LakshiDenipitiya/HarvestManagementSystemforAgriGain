<!--Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>

  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard/index_stockeeper'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>

  <style>
  .small-box {
    border-radius: 20px;
    border: 2px solid #73AD21;
    width: 250px;
    box-shadow: 0 7px 9px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .small-box-footer {
    border-radius: 15px;
    border: 2px ;
  }
  </style>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $buyer_count;?></h3>

          <p>Registered Buyers </p>
        </div>
        <div class="icon">
          <i class="ion ion-compose"></i>
        </div>
        <a href="<?php echo base_url('buyer/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
        <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green-gradient">
        <div class="inner">
          <h3><?php echo $supplier_count;?></h3>

          <p>Registerd Suppliers</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo base_url('supplier/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3><?php echo $supplyingorder_count;?></h3>

          <p>Supply orders </p>
        </div>
        <div class="icon">
          <i class="ion ion-social-buffer"></i>
        </div>
        <a href="<?php echo base_url('supplyingorder/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h3><?php echo $buyingorder_count;?></h3>

          <p>Buying Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-cart"></i>
        </div>
        <a href="<?php echo base_url('buyingorder/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-9 connectedSortable ui-sortable">
      <!--  (Charts JS)-->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Monthly Sales and Expenditure</h3>

        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart" style="height: 0px; width: 618px;" ></canvas>
            <?php
            $this->load->view('Charts/monthly_sales_and_expenditure');
            ?>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.chart js -->

      
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->





    <!--left col-->
    <section class="col-lg-3 connectedSortable ui-sortable">
   
      
        <!-- ./col -->
      
        
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $employee_count;?> </h3>

          <p>Registerd Employees</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo base_url('employee/index_stockeeper'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  

            <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>Go To</h3>

              <p>Current Stock</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
          <div class="small-box-footer">........
          </div>
          </div> 
       
         <!-- small box -->
        <div class="small-box bg-olive">
          <div class="inner">
            <h3>05</h3>

            <p>Metting Scheduled</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-calendar"></i>
          </div>
          <div class="small-box-footer">........
          </div>
        </div> 
        <!-- ./col -->

              </section> 
              <!-- right col -->

            </div>
            <!-- /.row (main row) -->

          </section>
          <!-- /.content -->
          

        </section>
    <!-- /.content