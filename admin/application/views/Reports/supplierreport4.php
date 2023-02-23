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
        
      

          <table class="table table-bordered table-striped table-hover dataTable" id="supplier">
           

            <thead>
              <tr>
                <th>Title</th> 
                <th>First Name</th> 
                <th>NIC</th> 
                <th>City</th> 
                <th>Age</th>
            
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($supplierList as $key => $supplier) {?>
              <tr>
                <th><?php echo $supplier->title; ?></th> 
                <td><?php echo $supplier->firstname; ?></td>
                <td><?php echo $supplier->nicno; ?></td>
                <td><?php echo $supplier->city; ?></td>
                <td><?php echo $supplier->age; ?></td>
                            
              </tr>

             
              <?php }?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div><br>
    <a target="_blank" href="<?php echo base_url('Reportsupplier/supplierReport3');?>" class="btn btn-success pull-right">Print</a>

    <br>
  </div>
</div>


</section>

<script type="text/javascript">
$(document).ready(function(){
  $('#employee').DataTable();


});
</script>


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
        
      

          <table class="table table-bordered table-striped table-hover dataTable" id="supplier">
           

            <thead>
              <tr>
                <th>Title</th> 
                <th>First Name</th> 
                <th>NIC</th> 
                <th>City</th> 
                <th>Age</th>
            
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($supplierList as $key => $supplier) {?>
              <tr>
                <th><?php echo $supplier->title; ?></th> 
                <td><?php echo $supplier->firstname; ?></td>
                <td><?php echo $supplier->nicno; ?></td>
                <td><?php echo $supplier->city; ?></td>
                <td><?php echo $supplier->age; ?></td>
                            
              </tr>

             
              <?php }?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div><br>
    <a target="_blank" href="<?php echo base_url('Reportsupplier/supplierReport');?>" class="btn btn-success pull-right">Print</a>

    <br>
  </div>
</div>


</section>

<script type="text/javascript">
$(document).ready(function(){
  $('#employee').DataTable();


});
</script>


