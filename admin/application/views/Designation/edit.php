<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Designation
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
        
        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Designation </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">
          
           <?php echo form_open('Designation/update/'.$selectedUser->id) ?>

           
           <div class = "row">
            <div class= "required col-md-2 col-md-offset-3">
                <?php echo form_label('Designation'); ?>
            </div>
            <div class= "col-md-4 col-md-offset-0">
                <?php echo form_input(array('id' => 'designation', 'name' => 'designation', 'class' => 'form-control','value' => $selectedUser->designation)); ?>
                <?php echo form_error('designation'); ?>
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