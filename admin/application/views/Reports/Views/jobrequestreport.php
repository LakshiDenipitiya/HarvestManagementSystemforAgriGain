<?php //var_dump($suppliers);?>
<section class="content-header">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts/css/bootstrap.css');?>">
  <style type="text/css">
  .success{
    color : green;
  }
  </style>

</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

      <!-- Display success Message -->
      <?php if($this->session->flashdata("message")): ?>

      <p class="success">
        <?php echo $this->session->flashdata("message");?>
      </p>

    <?php endif; ?>


    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Job Requests Details</h3>
      </div>
      <div class="box-body">
        
        
        <div class="table table-responsive">
          <table class="table table-bordered table-striped table-hover dataTable" id="jobrequest">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Vehicle No</th> 
                <th>Service Type Service</th>
                <th>Mechanical Type Service</th>
                <th>Used spare parts</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($jobrequests as $key => $jobrequest) {?>
              <tr>
                <td><?php echo $jobrequest->customer; ?></td>
                <td><?php echo $jobrequest->vehicleno; ?></td>
                <td><?php foreach ($jobrequest->Services as $key => $service) {?>
                  <label class="label label-success"> <?php echo $service->code; ?></label>
                  <?php } ?></td>
                  <td><?php foreach ($jobrequest->Mechanicals as $key => $mechanical) {?>
                    <label class="label label-success"> <?php echo $mechanical->type; ?></label>
                    <?php } ?></td>
                    <td><?php foreach ($jobrequest->Spareparts as $key => $sparepart) {?>
                      <label class="label label-success"> <?php echo $sparepart->categoryofsparepart; ?></label>
                      <?php } ?></td>
                      
                    </tr>

                    <!-- <li><?php echo $key . " : " .$supplier->name; ?></li> -->
                    <?php }?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div><br>
          <a target="_blank" href="<?php echo base_url('Jobrequestpdf/jobrequestreport');?>" class="btn btn-success pull-right">Print</a><br>
        </div>
      </div>


    </section>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#servicess').DataTable();

    });
    </script>