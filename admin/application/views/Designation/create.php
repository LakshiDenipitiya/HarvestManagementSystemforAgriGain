<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Designation
    <small>create</small>
</h1>
<script type="text/javascript">

$(document).ready(function(){

            //using select2 dropdown
            $("#module_id").select2();
            

          });//end of the document.ready function
</script>


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
       
     <div class="box-header with-border"><h3 align="center" class="box-title">Designation Registration Form</h3>
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <div class="box-body">

       <?php echo form_open("Designation/save")?>

       <div class = "row">
        <div class= "required col-md-2 col-md-offset-3">
          <?php echo form_label("Designation/තනතුර/பதவி")?>
      </div>
      <div class= "col-md-4 col-md-offset-0">
          <?php echo form_input(array("id"=>"designation", "name" => "designation", "class" => "form-control","value"=>set_value('designation')))?>
          <?php echo form_error('designation');?>
      </div>
  </div>
  
</br>

    </div> 
</br>  

<div class = "row">
  <div class= "col-md-2 col-md-offset-5">
     <?php echo form_submit(array('value' => 'Save','class'=>'btn btn-primary form-control'))?>
 </div>
 <div class= "col-md-2 col-md-offset-0">
     <?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default '))?>
 </div>
</div>
<?php echo form_close()?>
</div>
</div>
</div>
<br>

</section>
<!-- /.content -->


