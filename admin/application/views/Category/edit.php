<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Category
    <small>edit</small>
</h1>
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
        
        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Category </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">
          
           <?php echo form_open('Category/update/'.$selectedUser->id) ?>

           
           <div class= "form-group">
    
        <div class= "row">
            <div class="required col-md-3 col-md-offset-2">
                <?php echo form_label('Code/කේතය/குறியீடு'); ?>
            </div>
            <div class="col-md-5 col-md-offset-0">
                <?php echo form_input(array('id' => 'code', 'name' => 'code', 'class' => 'form-control','value' =>$selectedUser->code)); ?>
                <?php echo form_error('code'); ?>
            </div>
        </div>
        <br>
        <div class= "row">
            <div class="required col-md-3 col-md-offset-2">
                <?php echo form_label('Category/වර්ගය/வகை'); ?>
            </div>
            <div class="col-md-5 col-md-offset-0">
                <?php echo form_input(array('id' => 'category', 'name' => 'category', 'class' => 'form-control','value' =>$selectedUser->category)); ?>
                <?php echo form_error('category'); ?>
            </div>
        </div>
        <br>
           <div class= "row">
            <div class="required col-md-3 col-md-offset-2">
                <?php echo form_label('Unit/ඒකකය/அலகு'); ?>
            </div>
            <div class="col-md-5 col-md-offset-0">
                <?php echo form_input(array('id' => 'unit', 'name' => 'unit', 'class' => 'form-control','value' =>$selectedUser->unit)); ?>
                <?php echo form_error('unit'); ?>
            </div>
        </div>
    </div>
</br>

<div class = "row">
    <div class= "col-md-2 col-md-offset-5">
        <?php echo form_submit(array('value' => 'Update', 'class'=>'btn btn-primary form-control'))?>
    </div>
</div>
<?php echo form_close()?>
</div>
</div>



</section>
    <!-- /.content -->