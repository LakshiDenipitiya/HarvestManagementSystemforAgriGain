<section class="content-header">
 <style type="text/css">
    .dataTables_filter,.dataTables_info { display:none;}
    </style>
  </style>

</section>

<section class="content">
  <div class="row">

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Supplier Details</h3>
      </div>
      <div class="box-body">
        
        
        <div class="table table-responsive">
 
           <?php echo form_open("Reportsupplier/selectcitytype")?>
                        <div class="table table-responsive">
                           <select name="city_type" required="required">
                            <option value="">Select City Type</option>
                       
                            <option value="2">Anuradhapura</option>
                            <option value="3">Colombo</option>
                            <option value="4">Monaragala</option>
            
                          
                          
                            
                           </select>
                           <button type="submit" name="selectcity_type"> 
                            Select
                           </button>
                        <?php echo form_close()?>
                        </div>


        
        </div>
      </div>
    </div><br>


    <br>
  </div>
</div>


</section>

<script type="text/javascript">
$(document).ready(function(){
  $('#employee').DataTable();


});
</script>


