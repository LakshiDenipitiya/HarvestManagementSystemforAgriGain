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
        <h3 class="box-title">Employee Details</h3>
      </div>
      <div class="box-body">
        
        
        <div class="table table-responsive">
           <div class= "col-md-2 col-md-offset-2">
           <tr >
              <td>
                <label>Select Location</label>
              </td>
            </tr>
          </div>
          <div class= "col-md-3 col-md-offset-2">
            <tr>
              <td>
                <?php echo form_input(array("id"=>"location", "name" => "location", "class" => "form-control"))?>
              </td>
            </tr>
          </div>
<br>
          <table class="table table-bordered table-striped table-hover dataTable" id="employee">
           

            <thead>
              <tr>
                <th>Location</th> 
                <th>Name</th> 
                <th>Address</th> 
                <th>NIC</th> 
                <th>Phone No</th>
                <th>Email</th>
                <th>Designation</th>
               
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employees as $key => $employee) {?>
              <tr>
                <th><?php echo $employee->location; ?></th> 
                <td><?php echo $employee->title.'&nbsp;.'.$employee->firstname.'&nbsp;'.$employee->lastname; ?></td>
                <td><?php echo $employee->no.'&nbsp;,'.$employee->lane.'&nbsp;,'.$employee->city; ?></td>
                <td><?php echo $employee->nicno; ?></td>
                <td><?php echo $employee->phoneno; ?></td>
                <td><?php echo $employee->email; ?></td> 
                <td><?php echo $employee->designation; ?></td> 
           

                
              </tr>

              <!-- <li><?php echo $key . " : " .$supplier->name; ?></li> -->
              <?php }?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div><br>
    <a target="_blank" href="<?php echo base_url('Reportemployee/employeeReport');?>" class="btn btn-success pull-right">Print</a><br>
  </div>
</div>


</section>

<script type="text/javascript">
$(document).ready(function(){
  $('#employee').DataTable();


});
</script>


