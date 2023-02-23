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
    background-image: url("<?php echo base_url('assertsN/images/pp1.jpg');?>");
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

 <!-- start header_top -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

          <div class="item active">
            <img src="<?php echo base_url('assertsN/images/img1.1.jpg'); ?>" alt=" " style="width:100%;">
            <div class="carousel-caption">
            <div class="header-text">
                </br>
                <h1><b><strong style="font-style:sanserif">Welcome to AgriGain</strong></b></h1>
                </br>
                <h2><b>Best Palce For Buying and Selling Harvest</b></h2>
                <p> </p>
                </br> 
                 <!--  <div class="banner_btn">
                    <a href="#statement" class="class scroll"><b>Find More</b></a>
                  </div> -->
              </div>
                 </br>
                 </br>
                 </br>
                 </br>
                  </br>
            </div>
                
            </div>
            
          

          <div class="item">
            <img src="<?php echo base_url('assertsN/images/re1.jpg'); ?>" alt=" " style="width:100%;">
            <div class="carousel-caption">
            <div class="header-text">
                </br>
                <h1><b><strong style="font-style:sanserif">We are here for you</strong></b></h1>
                </br>
                <h2><b>We grantee the best price for your harvest</b></h2>
                <p> </p>
                </br> 
                  <div class="banner_btn">
                    <a href="#menu" class="class scroll"><b>Find More</b></a>
                  </div>
              </div>
                 </br>
                 </br>
                 </br>
                 </br>
                 </br>
                 </br>
                 
            </div>
               
            </div>
        
          <div class="item">
            <img src="<?php echo base_url('assertsN/images/img20-1.jpg'); ?>" alt=" " style="width:100%;">
            <div class="carousel-caption">
            <div class="header-text">
                </br>
                <h1><b><strong style="font-style:sanserif">From Farm to Your Hands</strong></b></h1>
                </br>
                <h2><b>Best intermediery for farmer and buyer</b></h2>
                <p> </p>
                </br> 
                  <div class="banner_btn">
                    <a href="#menu" class="class scroll"><b>Find More</b></a>
                  </div>
              </div>
                 </br>
                 </br>
                 </br>
                 </br>
                 </br>
                 </br>
                 </br>  
                 </br>
                 </br>
                 </br>
                 </br>
            </div>
          </div>

        </div>



        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
<!--  <div class="container">
      <div class="header-text">
      <h1><b><stong style="font-style:serif">Welcome to P and P Motors</strong></b></h1>
      <h2><b>Best Choice For service your vehicle</b></h2>
      <p> </p>
      <div class="banner_btn">
        <a href="#menu" class="class scroll"><b>Find More</b></a>
      </div>
      </div>
      <div class="header-arrow">
         <a href="#menu" class="class scroll"><span> </span> </a>
      </div>
    </div>-->

    <!-- end header_top -->

    <div class="main">
     <div class="container">
       </br>
              <div class="statement" style="width : 800px; text-align:justify; margin:0 auto;border:1px solid black;border-radius: 5px;
    padding-top: 30px;
    padding-right: 30px;
    padding-bottom: 30px;
    padding-left: 30px;" >
           <p><b>
AgriGain is a non-governmental company which is establish for buying and selling harvest, in a innovative way. </br>

We are dedicated to offering high-quality service for both farmers and buyers. We have skilled staff to assist you form the farm to home. </br>

We are the best intermediary between the farmer and and the buyer. We provide reasonable prices. We differentiate ourselves by understanding our community and satisfying their needs.</br>

Feel free to browse here and check out the Features. If you wish to sell or buy harvest sign up and make an appointment. </br>

To learn more about AgriGain visit our website amd enjoy the online platform for harvest management. We look forward to meeting you.</b></p>

          </div>
     </br>


<div class="row">

 <div class="col-md-4 col-md-offset-4"  >
    <ul class="single_times" style="background:#78846a;" >
      <h3>Opening <span class="opening">Hours</span></h3>
      <li><i class="calender"> </i><span class="week_class">Monday</span><div class="hours_class">8:00 AM – 5:30 PM</div>  <div class="clear"></div></li>
      <li><i class="calender"> </i><span class="week_class">Tuesday</span><div class="hours_class">8:00 AM – 5:30 PM</div>  <div class="clear"></div></li>
      <li><i class="calender"> </i><span class="week_class">Wednesday</span><div class="hours_class">8:00 AM – 5:30 PM</div>  <div class="clear"></div></li>
      <li><i class="calender"> </i><span class="week_class">Thrusday</span><div class="hours_class">8:00 AM – 5:30 PM</div>  <div class="clear"></div></li>
      <li><i class="calender"> </i><span class="week_class">Friday</span><div class="hours_class">8:00 AM – 5:30 PM</div>  <div class="clear"></div></li>
      <li><i class="calender"> </i><span class="week_class">Saturday</span><div class="hours_class">8:00 AM – 5:30 PM</div>  <div class="clear"></div></li>
      <li><i class="calender"> </i><span class="week_class">Sunday</span><div class="hours_class">8:00 AM – 5:30 PM</div>  <div class="clear"></div></li>
      <p style="text-align:center">Come, Visit and Enjoy it!</p>
    </ul>
  </div>

</div>
</div>
</div>
</section>   