<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Item
    <small>edit</small>
</h1>

<script type="text/javascript">

$(document).ready(function(){
            
             //using select2 dropdown
            $("#category_id").select2();

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
        
        <div class="box-header with-border"><h3 align="center" class="box-title">Edit Item</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">

         <?php echo form_open('Item/update/'.$selectedUser->i_id) ?>
         <?php echo form_open_multipart('Upload_Controller/do_upload/'.$selectedUser->i_id) ?> 

            <div class = "row">
                <div class="required col-md-2 col-md-offset-3">
                    <?php echo form_label("Category")?>
                </div>
                <div class="col-md-3 col-md-offset-0">
                    <?php 

                    $data = array(
                        'id'=>'category_id',
                        'class'=>'form-control',
                        'name'=>'category');

                    echo form_dropdown ('category_id',$categoryList,$selectedUser->category_id,$data);
                    echo form_error('category_id');?>
                </div>
                <div class= "col-md-2 col-md-offset-0"> 
                    
                    <a href="<?php echo base_url('category/create'); ?>" class="btn btn-info">Add New</a>
                    
                </div>
            </div>

</br>
                <div class = "row">
                    <div class="required col-md-2 col-md-offset-3">
                        <?php echo form_label('Code'); ?>
                    </div>
                    <div class="col-md-3 col-md-offset-0">
                        <?php echo form_input(array('id' => 'i_code', 'name' => 'i_code',"class" => "form-control", 'value' => $selectedUser->i_code)); ?>
                        <?php echo form_error('i_code'); ?>
                    </div>
                </div>
                <br>
                <div class = "row">
                    <div class="required col-md-2 col-md-offset-3">
                        <?php echo form_label('Item name'); ?>
                    </div>
                    <div class="col-md-3 col-md-offset-0">
                        <?php echo form_input(array('id' => 'item', 'name' => 'item',"class" => "form-control", 'value' => $selectedUser->item)); ?>
                        <?php echo form_error('item'); ?>
                    </div>
                </div>
            </br>
            <div class = "row">
                    <div class="required col-md-2 col-md-offset-3">
                        <?php echo form_label('Image of Item'); ?>
                    </div>
                    <div class="col-md-3 col-md-offset-0">
                        <?php echo form_upload(array('id' => 'itemimage', 'name' => 'itemimage',"class" => "form-control", 'value' => $selectedUser->itemimage)); ?>
                        <?php echo form_error('itemimage'); ?>
                    </div>
                </div>
            </br>
   
        <div class = "row">
            <div class="required col-md-2 col-md-offset-3">
                <?php echo form_label('Buying Price'); ?>
            </div>
            <div class="col-md-3 col-md-offset-0">    
                <?php echo form_input(array('id' => 'buyingprice', 'name' => 'buyingprice',"class" => "form-control", 'value' => $selectedUser->buyingprice)); ?>
                <?php echo form_error('buyingprice'); ?>
            </div>
        </div>  
    </br>    
    
    <div class = "row">
        <div class="required col-md-2 col-md-offset-3">
            <?php echo form_label('Selling Price'); ?>
        </div>
        <div class="col-md-3 col-md-offset-0">   
            <?php echo form_input(array('id' => 'sellingprice', 'name' => 'sellingprice',"class" => "form-control", 'value' => $selectedUser->sellingprice)); ?>
            <?php echo form_error('sellingprice'); ?>
        </div>
    </div>

</br>
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



