<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Employee
    <small>edit</small>
</h1>
  <!--    <script type="text/javascript" >
    $(document).ready(function(){
        
            //using select2 dropdown
            $("#designation_id").select2();
   
    });
</script>-->

<style>
.required:after {
    content:" *";
    position: relative;
    top: 0;
    right: -1px;
    color: red;
}
</style>     
</section>

<!-- Main content -->
<section class="content">


    <div class="box box-default">
        
        <div class="box-header with-border"><h3 align="center" class="box-title">
            <a href="<?php echo base_url() ?>/employee">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a> Edit Employee</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
          
           <?php echo form_open('Employee/update/'.$selectedUser->id) ?>

           
           
           <div class= "form-group">
            <fieldset class="col-md-8 col-md-offset-2">     
                <legend>General Information</legend>

                <div class = "row" >
                    <div class= "required col-md-3 col-md-offset-1">
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

                <div class= "row">
                    <div class="required col-md-3 col-md-offset-1">
                        <?php echo form_label('First Name'); ?>
                    </div>
                    <div class="col-md-5 col-md-offset-0">
                        <?php echo form_input(array('id' => 'firstname', 'name' => 'firstname', 'class' => 'form-control', 'value' => $selectedUser->firstname)); ?>
                        <?php echo form_error('firstname'); ?>
                    </div>
                </div>

            </br>
            <div class= "row">
                <div class="required col-md-3 col-md-offset-1">
                    <?php echo form_label('Last Name'); ?>
                </div>
                <div class="col-md-5 col-md-offset-0">
                    <?php echo form_input(array('id' => 'lastname', 'name' => 'lastname', 'class' => 'form-control','value' =>$selectedUser->lastname)); ?>
                    <?php echo form_error('lastname'); ?>
                </div>
            </div>
        </br>
        <div class= "row">
            <div class="required col-md-3 col-md-offset-1">
                <?php echo form_label("NIC No")?>
            </div>
            <div class="col-md-5 col-md-offset-0">
                <?php echo form_input(array("id"=>"nicno", "name" => "nicno", "class" => "form-control","value"=>$selectedUser->nicno));?>
                <?php echo form_error('nicno');?>
            </div>
        </div>
    </br>
    <div class= "row">
        <div class="required col-md-3 col-md-offset-1">
            <?php echo form_label("Date of Birth")?>
        </div>
        <div class="col-md-5 col-md-offset-0">
            <?php echo form_input(array("id"=>"dateofbirth", "name" => "dateofbirth", "class" => "form-control","value"=>$selectedUser->dateofbirth));?>
            <?php echo form_error('dateofbirth');?>
        </div>
    </div>
</br>
<div class="row">
    <div class="required col-md-3 col-md-offset-1">
        <?php echo form_label("Marital Status")?>
    </div>
    <div class="col-md-5 ">    
        <?php 
        $data=array('class'=>'',);
        echo form_radio('maritalstatus','Married',$selectedUser->maritalstatus == 'Married' ,$data).'Married'.'<br>';
        echo form_radio('maritalstatus','Unmarried',$selectedUser->maritalstatus == 'Unmarried',$data).'Unmarried';
        echo form_error('maritalstatus');
        ?>
    </div> 
</div>  
</br>
<div class="row">
    <div class="required col-md-3 col-md-offset-1">
        <?php echo form_label("Gender")?>
    </div>
    <div class="col-md-5 ">    
        <?php 
        $data=array('class'=>'',);
        echo form_radio('gender','Male',$selectedUser->gender == 'Male' ,$data).'Male'.'<br>';
        echo form_radio('gender','Female',$selectedUser->gender == 'Female',$data).'Female';
        echo form_error('gender');
        ?>
    </div> 
</div>  

</br>
</fieldset>
</div>    

<div class= "form-group">
    <fieldset class="col-md-8 col-md-offset-2">     
        <legend>Postal Information</legend>
        
        <div class= "row">
            <div class="required col-md-3 col-md-offset-1">
                <?php echo form_label('No'); ?>
            </div>    
            <div class = "col-md-5 col-md-offset-0">
                <?php echo form_input(array('id' => 'no', 'name' => 'no','class' => 'form-control', 'value' => $selectedUser->no)); ?>
                <?php echo form_error('no'); ?>
            </div>
        </div>
    </br>
    <div class= "row">
        <div class = "required col-md-3 col-md-offset-1">
            <?php echo form_label('Lane'); ?>
        </div>
        <div class = "col-md-5 col-md-offset-0">    
            <?php echo form_input(array('id' => 'lane', 'name' => 'lane','class' => 'form-control', 'value' => $selectedUser->lane)); ?>
            <?php echo form_error('lane'); ?>
        </div>
    </div>
</br>
<div class = "row">
    <div class= "required col-md-3 col-md-offset-1">
        <?php echo form_label('City'); ?>
    </div>
    <div class= "col-md-5 col-md-offset-0">
        <?php echo form_input(array('id' => 'city', 'name' => 'city','class' => 'form-control', 'value' => $selectedUser->city)); ?>
        <?php echo form_error('city'); ?>
    </div>
</div>
</br>
<div class = "row">
    <div class= "required col-md-3 col-md-offset-1">
        <?php echo form_label("Location")?>
    </div>
    <div class= "col-md-5 col-md-offset-0"> 
        <?php 

        $data = array(
            'id'=>'location_id',
            'class'=>'form-control',
            'name'=>'location');


        echo form_dropdown ('location_id',$locationList,$selectedUser->location_id,$data);
        echo form_error('location_id');?>
    </div>
    <div class= "col-md-2 col-md-offset-0"> 
        
        <a href="<?php echo base_url('Location/create'); ?>" class="btn btn-info">Add New</a>
        
    </div>
</div>
</fieldset>
</div>
</br>

<div class= "form-group">
    <fieldset class="col-md-8 col-md-offset-2">     
        <legend>Contact Information</legend>
        
        <div class= "row">
            <div class= "required col-md-3 col-md-offset-1">
                <?php echo form_label('Phone No'); ?>
            </div>
            <div class="col-md-5 col-md-offset-0">
                <?php echo form_input(array('id' => 'phoneno', 'name' => 'phoneno','class' => 'form-control', 'value' => $selectedUser->phoneno)); ?>
                <?php echo form_error('phoneno'); ?>
            </div>
        </div>
    </br>
    <div class = "row">
        <div class= "col-md-3 col-md-offset-1">
            <?php echo form_label('Email'); ?>
        </div>
        <div class= "col-md-5 col-md-offset-0">
            <?php echo form_input(array('id' => 'email', 'name' => 'email', 'class' => 'form-control','value' => $selectedUser->email)); ?>
            <?php echo form_error('email'); ?>
        </div>
    </div>
    
</fieldset>
</div>

</br>

<div class= "form-group">
    <fieldset class="col-md-8 col-md-offset-2">     
        <legend>Service Information</legend>

               <div class = "row">
    <div class= "required col-md-3 col-md-offset-1">
        <?php echo form_label("Designation")?>
    </div>
    <div class= "col-md-5 col-md-offset-0"> 
        <?php 

        $data = array(
            'id'=>'designation_id',
            'class'=>'form-control',
            'name'=>'designation');


        echo form_dropdown ('designation_id',$designationList,$selectedUser->designation_id,$data);
        echo form_error('designation_id');?>
    </div>
    <div class= "col-md-2 col-md-offset-0"> 
        
        <a href="<?php echo base_url('designation/create'); ?>" class="btn btn-info">Add New</a>
        
    </div>
</div>
<br>
                <div class = "row">
                    <div class= "required col-md-3 col-md-offset-1">
                        <?php echo form_label("Date of Recruitment")?>
                    </div>
                    <div class= "col-md-4 col-md-offset-0">
                        <?php echo form_input(array("id"=>"dateofrecruitment", "name" => "dateofrecruitment", "class" => "form-control", "type" => "date","value"=>$selectedUser->dateofrecruitment));?>
                        <?php echo form_error('dateofrecruitment');?>
                    </div>
                </div>
            </br>
            <div class = "row">
                <div class= "required col-md-3 col-md-offset-1">
                    <?php echo form_label("Date of Resigned")?>
                </div>
                <div class= "col-md-4 col-md-offset-0">
                    <?php echo form_input(array("id"=>"dateofresigned", "name" => "dateofresigned", "class" => "form-control","type" => "date","value"=>$selectedUser->dateofresigned));?>
                    <?php echo form_error('dateofresigned');?>
                </div>
            </div>
            
        </br>
    </fieldset>
</div>
</br>

   <!--  <div class= "form-group">
            <fieldset class="col-md-8 col-md-offset-2">     
                <legend>Login Information</legend>

                <div class = "row">
                    <div class= "required col-md-3 col-md-offset-1">
                        <?php echo form_label("Username")?>
                    </div>
                    <div class= "col-md-5 col-md-offset-0">
                    <?php echo form_input(array("id"=>"username", "name" => "username", "class" => "form-control","value"=>$selectedUser->username));?>
                    <?php echo form_error('username');?>
                    </div>
                </div>
    </br>
                <div class = "row">
                    <div class= "required col-md-3 col-md-offset-1">
                        <?php echo form_label("Password")?>
                    </div>
                    <div class= "col-md-5 col-md-offset-0">
                        <?php echo form_input(array("id"=>"password", "name" => "password", "class" => "form-control","value"=>$selectedUser->password));?>
                        <?php echo form_error('password');?>
                    </div>
                </div>
 
    </br> 
</fieldset>-->

</br>
<div class= "form-group">
    <div class = "row">
        <div class= "col-md-2 col-md-offset-5">
            <?php echo form_submit(array('value' => 'Update', 'class'=>'btn btn-primary form-control'))?>
        </div>
    </div>
</div>

<?php echo form_close()?>
</div>
</div>



</section>
    <!-- /.content -->