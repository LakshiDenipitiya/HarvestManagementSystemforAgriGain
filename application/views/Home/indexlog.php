<!-- Content Header (Page header) -->
<section class="content-header">

  <script type="text/javascript">
  jQuery(document).ready(function($) {

    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
    });

    $('.col-lg-4').hover(
        //trigger when mouse hover
        function(){
          $(this).animate({
            marginTop:"-=1%",
          },200);
        },
        //trigger when mouse out
        function(){
          $(this).animate({
            marginTop:"0%",
          },200);
        },
        
        );
  });
  </script>

  <style>

  .main{
    background-image: url("<?php echo base_url('assertsN/images/rr2.jpg');?>");
    /* Full height */
    height: 25%; 

    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
  };

  .row{
    margin-top: 20%;
    margin-left: 8%;
  }
  .card:hover{
    -webkit-box-shadow:-1px 9px 40px -12px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
    box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
  }

  </style>
</section>
<!-- Main content -->
<section class="content">

 

    <div class="main">
     <div class="container">
       </br>
      
       <?php 
       if($pendingorders){
       foreach($pendingorders as $po){

          $status = "";
          if($po->status==1){
             $status='Supplier agreed - Ready to Advance Payment';
          }else if($po->status==2){
              $status='Buyer agreed - Ready to Advance Payment';
            }else if($po->status==3){
              $status='Advance Payment - Assign Agri Officer';
            }else if($po->status==4){
              $status='Ready to purchase';
            }else if($po->status==5){
              $status='Ready to distpatch';
            }
        ?>
            <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Reminder</strong> Your <?php echo $lablename; ?> order no   <?php 
              if($this->session->userdata('type')=="buyer"){
              echo $po->buyerorder_boi_id;
              }else{
                echo $po->supplierorder_soi_id;
              }
              ?> [<?php echo $po->item;?>] is in <?php echo $status;?> status
            </div>
        <?php
         }
       }
       ?>

    

       <div class="row">
      <div class="col-lg-4">
        <!--bootstrap card-->
        <div class="card" style="width:30rem; text-align:center; background-color:#3CB371; padding:10px;">
          <img src="<?php echo base_url('assertsN/images/img43-2.jpg'); ?>" alt=" " class="card-img-top" style="width:225px; height:200px;">
          <div class="card-body">
            <h3 class="card-title" style=""><b>Place an Order</b></h3>
            <p class="card-text">You can easily place your order here </p>

          <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')){
          if($this->session->userdata('type')=="supplier"){     
          ?>

           <a href="<?php echo base_url('index.php/supplyingorder/create'); ?>"><button type="button" class="btn btn-primary" >Click Here...</button></a>
         <?php
          }else{
            ?>
           <a href="<?php echo base_url('index.php/buyingorder/create'); ?>"><button type="button" class="btn btn-primary" >Click Here...</button></a>
            <?php
          }
         }
         ?>
          
          </div>
        </div>
      </div>


  <div class="col-lg-4 ml-2">
    <!--bootstrap card-->
    <div class="card" style="width:30rem; text-align:center; background-color:#3CB371; padding:10px;">
      <img src="<?php echo base_url('assertsN/images/img44-1.jpg'); ?>" alt=" " class="card-img-top" style="width:275px; height:200px;">
      <div class="card-body">
        <h3 class="card-title"><b>Available Orders</b></h3>
        <p class="card-text">Find the available orders</p>

         <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')){
          if($this->session->userdata('type')=="supplier"){     
          ?>

           <a href="<?php echo base_url('index.php/Manageorder/supplyingordermanage'); ?>"><button type="button" class="btn btn-primary" >Click Here...</button></a>
         <?php
          }else{
            ?>
           <a href="<?php echo base_url('index.php/Manageorder/buyingordermanage'); ?>"><button type="button" class="btn btn-primary" >Click Here...</button></a>
            <?php
          }
         }
         ?>

      </div>
      </div>
    </div>

    
    <div class="col-lg-4 ml-2">
      <!--bootstrap card-->
      <div class="card" style="width:30rem; text-align:center; background-color:#3CB371; padding:10px;">
        <img src="<?php echo base_url('assertsN/images/img45-2.png'); ?>" alt=" " class="card-img-top" style="width:225px; height:200px;">
        <div class="card-body">
          <h3 class="card-title" style="color:f3f3f3"><b>Order Status</b></h3>
          <p class="card-text">Check your order status here</p>

             <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')){ 
          ?>

           <a href="<?php echo base_url('index.php/Manageorderstatus/index_all_fullview'); ?>"><button type="button" class="btn btn-primary" >Click Here...</button></a>
        
          
            <?php
          
         }
         ?>

       </div>
      </div>
    </div>





  </div>
 
</div>
</br>
<div class="row">
 <!--  <div class="col-lg-4 ml-2 col-lg-offset-2"> -->
    <!--bootstrap card-->
   <!--  <div class="card" style="width:32rem; text-align:center; background-color:#d5d0d0; padding:10px;">
      <img src="<?php echo base_url('assertsN/images/img45.jpg'); ?>" alt=" " class="card-img-top">
      <div class="card-body">
        <h3 class="card-title"><b>Due Payments</b></h3>
        <p class="card-text">It is time for you to settle the payments.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">More...</button>
      </div>
    </div>
  </div> -->
<!--   <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog"> -->

     <!-- Modal content-->
     <!-- <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center;"><b>Due payments</b></h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> -->

    <div class="col-lg-4 ml-2 col-lg-offset-2">
      <!--bootstrap card-->
      <div class="card" style="width:32rem; text-align:center; background-color:#3CB371; padding:10px;">
        <img src="<?php echo base_url('assertsN/images/Comp2.jpg'); ?>" alt=" " class="card-img-top" style="width:260px; height:230px;">
        <div class="card-body">
          <h3 class="card-title" style="color:f3f3f3"><b>Your Order List</b></h3>
          <p class="card-text">Find the details of orders placed by you</p>
                <?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('login_as_customer')){
          if($this->session->userdata('type')=="supplier"){     
          ?>

           <a href="<?php echo base_url('index.php/Supplyingorder/index'); ?>"><button type="button" class="btn btn-primary" >Click Here...</button></a>
         <?php
          }else{
            ?>
           <a href="<?php echo base_url('index.php/Buyingorder/index'); ?>"><button type="button" class="btn btn-primary" >Click Here...</button></a>
            <?php
          }
         }
         ?>
        </div>
      </div>
    </div>

    <div class="col-lg-4 ml-2 ">
   
      <div class="card" style="width:32rem; text-align:center; background-color:#3CB371; padding:10px;">
        <img src="<?php echo base_url('assertsN/images/Comp.jpg'); ?>" alt=" " class="card-img-top" style="width:260px; height:230px;">
        <div class="card-body">
          <h3 class="card-title" style="color:f3f3f3"><b>Order History</b></h3>
          <p class="card-text">Check your order history</p>
          <a href="<?php echo base_url('index.php/Manageorderstatus/order_history'); ?>"><button type="button" class="btn btn-primary" >Click Here...</button></a>
        </div>
      </div>
    </div> 
</div>
</br>
</div>
</div>
</section>   