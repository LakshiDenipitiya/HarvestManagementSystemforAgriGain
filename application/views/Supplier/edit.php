<!-- Content Header (Page header) -->
<section class="content-header">
    <style>
     .required:after {
    content:" *";
    position: relative;
    top: 0;
    right: -1px;
    color: red;
}

 .content{
    background-image: url("<?php echo base_url('assertsN/images/cr4.jpg');?>");
    height: 100%;
    width: 100%;
    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 }

 .innercontent{
       /* Full height */
  width: 80%;
  padding-left: 20%;
    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 }

 .box-header{
    background-color: whitesmoke;

 }
 .box-body{
    background-color: whitesmoke;
    padding: 20px;
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

    <div class="innercontent">
    <!-- Display success Message -->
    <?php if($this->session->flashdata("message")){ ?>
    
    <!--display sucess message-->
    <p class="success">
        <?php echo $this->session->flashdata("message");?>
    </p>
    
    <?php } ?>


    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Your Profile </h3>
        </div>
        <div class="box-body">

            <?php echo form_open('Supplier/update/'.$selectedUser->id) ?>

            <div class= "form-group">
                   
                    <legend>General Information/සාමාන්‍ය තොරතුරු/பொதுவான செய்தி</legend>

                    <div class = "row">
                        <div class= "required col-md-3 col-md-offset-2">
                            <?php echo form_label("Title")?>
                        </div>
                        <div class= "col-md-3">
                            <?php 
                            $options=array(
                                ''  => 'Select',
                                'Mr'    => 'Mr',
                                'Mrs'   => 'Mrs',
                                'Ms'   => 'Ms',);

                            $data=array(
                                'id'=>'title',
                                'class'=>'form-control',
                                'name'=>'title');

                            echo form_dropdown('title',$titleDropdownOption,$selectedUser->title,$data);
                            echo form_error('title');?>
                        </div>
                    </div>
                    <br>
                    <div class = "row">
                        <div class= "required col-md-3 col-md-offset-2">
                            <?php echo form_label('First Name/මුල් නම/முதல் பெயர்'); ?>
                        </div>
                        <div class= "col-md-5 col-md-offset-0">
                            <?php echo form_input(array('id' => 'firstname', 'name' => 'firstname',"class" => "form-control", 'value' => $selectedUser->firstname)); ?>
                            <?php echo form_error('firstname'); ?>
                        </div>
                    </div>
                </br>
                <div class = "row">
                    <div class= "required col-md-3 col-md-offset-2">       
                        <?php echo form_label('Last Name/වාසගම/குடும்ப பெயர்'); ?>
                    </div>
                    <div class= "col-md-5 col-md-offset-0">                                        
                        <?php echo form_input(array('id' => 'lastname', 'name' => 'lastname',"class" => "form-control", 'value' =>$selectedUser->lastname)); ?>
                        <?php echo form_error('lastname'); ?>
                    </div>
                </div>
            </br>
            <div class = "row">
                <div class= "required col-md-3 col-md-offset-2">
                    <?php echo form_label('NIC No/ජා.හැ.අංකය/தேசிய அடையாள அட்டை எண்'); ?>
                </div>
                <div class= "col-md-5 col-md-offset-0">    
                    <?php echo form_input(array('id' => 'nicno', 'name' => 'nicno',"class" => "form-control", 'value' => $selectedUser->nicno)); ?>
                    <?php echo form_error('nicno'); ?>
                </div>
            </div>

    </div>
</br>   

<div class= "form-group">
    
        <legend>Postal Information/තැපැල් තොරතුරු/அஞ்சல் தகவல்</legend>

        <div class = "row">
            <div class= "required col-md-3 col-md-offset-2">
                <?php echo form_label('No/අංකය/எண்'); ?>
            </div>
            <div class= "col-md-3 col-md-offset-0">     
                <?php echo form_input(array('id' => 'no', 'name' => 'no',"class" => "form-control", 'value' => $selectedUser->no)); ?>
                <?php echo form_error('no'); ?>
            </div>
        </div>  
    </br>    
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label('Lane/වීදිය/தெரு'); ?>
        </div>
        <div class= "col-md-5 col-md-offset-0">     
            <?php echo form_input(array('id' => 'lane', 'name' => 'lane',"class" => "form-control", 'value' => $selectedUser->lane)); ?>
            <?php echo form_error('lane'); ?>
        </div>
    </div>  
</br>    
<div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label('City/නගරය/நகரம்'); ?>
    </div>
    <div class= "col-md-5 col-md-offset-0">    
        <?php echo form_input(array('id' => 'city', 'name' => 'city',"class" => "form-control", 'value' => $selectedUser->city)); ?>
        <?php echo form_error('city'); ?>
    </div>
</div>


</div>  
</br>

<div class= "form-group">
       
        <legend>Contact Information/සම්බන්ධීකරණ තොරතුරු/தொடர்பு தகவல்</legend>

        <div class = "row">
            <div class= "required col-md-3 col-md-offset-2">
                <?php echo form_label('Phone No/දුරකථන අංකය/தொலைபேசி எண்'); ?>
            </div>
            <div class= "col-md-5 col-md-offset-0">     
                <?php echo form_input(array('id' => 'phoneno', 'name' => 'phoneno',"class" => "form-control", 'value' => $selectedUser->phoneno)); ?>
                <?php echo form_error('phoneno'); ?>
            </div>
        </div>
    </br>
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label('Email/ඊ-මේල්/மின்னஞ்சல் முகவரி'); ?>
        </div>
        <div class= "col-md-5 col-md-offset-0">     
            <?php echo form_input(array('id' => 'email', 'name' => 'email',"class" => "form-control", 'value' => $selectedUser->email)); ?>
            <?php echo form_error('email'); ?>
        </div>
    </div>
</br>

</div>

<div class= "form-group">
        
        <legend>Supply Items/සැපයුම් අයිතම/பொருட்களை வழங்குதல்</legend>

    <div class = "row">
            <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label("Items you wish to supply/ඔබ සැපයීමට බලාපොරොත්තු වන භාණ්ඩ/நீங்கள் வழங்க விரும்பும் பொருட்கள்")?>
        </div>
            <div class= "col-md-5 col-md-offset-0"> 
                                        <?php 
                                            $data = array(
                                                'id'=>'item_i_id',
                                                'class'=>'form-control',
                                                'name'=>'item');

                                            echo form_multiselect ('item_i_id[]',$itemList,$supplier_item_id_list,$data);
                                            echo form_error('item_i_id');?>
                                    </div>
                                   
                                </div>

        </div>

</br>




<br>
<div class= "form-group">
    <div class = "row">
        <div class= "col-md-2 col-md-offset-4">  
            <?php echo form_submit(array('value' => 'Update', 'class'=>'btn btn-primary form-control'))?>
        </div>
    </div>
</div>
<?php echo form_close()?>
</div>
</div>
<br>



</section>
    <!-- /.content -->