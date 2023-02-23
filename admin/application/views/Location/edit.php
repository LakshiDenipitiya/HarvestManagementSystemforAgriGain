<!-- Content Header (Page header) -->
<section class="content-header">
 <h1>
    Location
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

        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Location </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">

          <!--form open from update function by selected id-->
          <?php echo form_open('Location/update/'.$selectedUser->id) ?>

          <!--location edit feild-->
          <div class = "row">
            <div class= "required col-md-2 col-md-offset-3">
                <?php echo form_label('Code/කේතය/குறியீடு'); ?>
            </div>
            <div class= "col-md-4 col-md-offset-0">
                <?php echo form_input(array('id' => 'code', 'name' => 'code', 'class' => 'form-control','value' => $selectedUser->code)); ?>
                <?php echo form_error('code'); ?>
            </div>
        </div>
    </br>
          <div class = "row">
            <div class= "required col-md-2 col-md-offset-3">
                <?php echo form_label('Location/ස්ථානය/இடம்'); ?>
            </div>
            <div class= "col-md-4 col-md-offset-0">
                <?php echo form_input(array('id' => 'location', 'name' => 'location', 'class' => 'form-control','value' => $selectedUser->location)); ?>
                <?php echo form_error('location'); ?>
            </div>
        </div>
    </br>
    <!--buttons-->
    <div class = "row">
        <div class= "col-md-2 col-md-offset-5">
            <?php echo form_submit(array('value' => 'Update', 'class'=>'btn btn-primary form-control'))?>
        </div>
    </div>
    <!--form close-->
    <?php echo form_close()?>
</div>
</div>



</section>
    <!-- /.content -->