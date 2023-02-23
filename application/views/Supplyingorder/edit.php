<!-- Content Header (Page header) -->
<section class="content-header">



<style>
.required:after {
    content:" *";
    position: relative;
    top: 0;
    right: -1px;
    color: red;

}

 .content{
    background-image: url("<?php echo base_url('assertsN/images/cr2.jpg');?>");
     /* Full height */
  height: 25%; 

    /* Center and scale the image nicely */
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
 }

 #suppliererror, #datefromerror, #datetoerror, #locationerror, #sbillingaddresserror {
  color: #F00;
  background-color: #FFF;
}

</style>
</section>

<!-- Main content -->
<section class="content">


</br>
    <div class="container">
    <div class="box box-default col-md-10 col-md-offset-1" style="background-color:#faffc5;">

    <div class="box box-default">
        
        <div class="box-header with-border"><h3 align="center" class="box-title">Supplying Order Registration Form/ සැපයුම් කිරීමේ ඇණවුම් ලියාපදිංචි කිරීමේ පෝරමය/ சப்ளை ஆர்டர் பதிவு படிவம்</h3>
        </div>

        <br>
        <br>
        <div class="box-body">




            <div class= "form-group">
  <div class = "row">
    <div class= "required col-md-3 col-md-offset-3">
        <?php echo form_label("Supplier Name/ සැපයුම්කරුගේ නම/ வழங்குநர் பெயர்")?>
    </div>
    <div class= "col-md-3 col-md-offset-0"> 
        <p><?php echo $user_records->firstname;?> <?php echo $user_records->lastname;?></p>
       <input type="hidden" name="supplier_id" value="<?php echo $this->session->userdata('employee_id')?>">
    </div>
    
    
</div>
</div>
</br>
<div class= "form-group">
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-3">
            <?php echo form_label("Date From/ දින සිට/ தேதி முதல்")?>
        </div>
        <div class= "col-md-3 ">
            <?php echo form_input(array("id"=>"date_from", "name" => "date_from", "type"=>"date", "class" => "form-control","value"=>$so_datails->date_from));?>
            <?php echo form_error('date_from');?>
            <p id="datefromerror"></p>
        </div>
    </div>
</div>
</br>
<div class= "form-group">
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-3">
            <?php echo form_label("Date To/ දින දක්වා/ தேதி வரை")?>
        </div>
        <div class= "col-md-3 ">
             <?php echo form_input(array("id"=>"date_to", "name" => "date_to", "type"=>"date", "class" => "form-control","value"=>$so_datails->date_to));?>
            <?php echo form_error('date_to');?>
            <p id="datetoerror"></p>
        </div>
    </div>
</div>
</br>

            <div class= "form-group">

                <div class = "row">
                    <div class ="required col-md-3 col-md-offset-3">
                        <?php echo form_label('Supplying Location/ විකුණුම් ස්ථානය/ விற்பனை செய்யும் இடம்');?>
                    </div>
                    <div class= "col-md-3"> 
                        <select class="form-control" name="location" id="location_id">
                            <?php 
                            foreach($locationDbList as $llst){
                              if($llst->id==$so_datails->location_id){
                            ?>
                            <option selected="selected" value="<?php echo $llst->id;?>"><?php echo $llst->location;?></option>
                            <?php
                              }else{
                            ?>
                            <option value="<?php echo $llst->id;?>"><?php echo $llst->location;?></option>
                            <?php
                              }  
                            }
                            ?>
                            
                             <p id="locationerror"></p>
                        </select>
                    </div>
                 </div>
                
            </div>

        </br>
               <div class= "form-group">
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-3">
            <?php echo form_label("Billing Address/ බිල්පත් ලිපිනය/ பில்லிங் முகவரி")?>
        </div>
        <div class= "col-md-3 ">
            <?php echo form_input(array("id"=>"s_billing_address", "name" => "s_billing_address", "type"=>"text","class" => "form-control","value"=>$so_datails->s_billing_address));?>
            <?php echo form_error('s_billing_address');?>
            <p id="sbillingaddresserror"></p>
        </div>
    </div>
</div>
</br>

   <fieldset class="col-md-8 col-md-offset-2">     
  <div class= "form-group">
           <legend><h4>Select each item, fill the quantitiy and click add to cart...<br>එක් එක් අයිතමය තෝරන්න. ප්‍රමාණය සඳහන්  add to cart ක්ලික් කරන්න...<br> ஒவ்வொரு பொருளையும் தேர்ந்தெடுத்து, அளவை நிரப்பி, add to cart என்பதைக் கிளிக் செய்யவும்...</h4></legend>
    <div class = "row">
    <div class= "required col-md-3 col-md-offset-2">
        <?php echo form_label("Item/ අයිතමය/ பொருள்")?>
    </div>
    <div class= "col-md-4 col-md-offset-1"> 
        <?php 

        $data = array(
            'id'=>'item_i_id',
            'class'=>'form-control',
            'name'=>'item_i_id');

        echo form_dropdown('item_i_id',$itemList,set_value('item_i_id'),$data);
        echo form_error('item_i_id');?>
    </div>
</div>
</div>
</br>

<div class= "form-group">
    <div class = "row">
        <div class= "required col-md-3 col-md-offset-2">
            <?php echo form_label("Quantity (Kg)/ ප්‍රමාණය (Kg)/ அளவு (கிலோ)")?>
        </div>
        <div class= "col-md-4 col-md-offset-1">
            <?php echo form_input(array("id"=>"quantity", "name" => "quantity", "type"=>"text", "class" => "form-control","value"=>set_value('quantity')));?>
            <?php echo form_error('quantity');?>
              </div>
    </div>
</div>
</fieldset>

<br>
<br>

 <div class= "col-md-2 col-md-offset-5"> 
                        <button class="btn btn-success" id="add_new">Add to Cart</button>
     </div>

<br> 
<br>
<br> 
<br>

 <div class= "col-md-12 col-md-offset-0">
<div class="row" style="font-size: x-large;">
          <i class="ion ion-android-cart"></i><b><i> Cart</i></b>
        </div>
        <br> 

<?php
$attributes = ['id' => 'myform'];
 echo form_open("Supplyingorder/updatesupplyingorder", $attributes)?>

    <input type="hidden" name="supplierid" id="supplierid" value="<?php echo $this->session->userdata('employee_id')?>"> 
    <input type="hidden" name="soid" id="soid" value="<?php echo $so_datails->so_id;?>"> 
    <input type="hidden" name="fromd" id="fromd" value="<?php echo $so_datails->date_from;?>"> 
    <input type="hidden" name="tod" id="tod" value="<?php echo $so_datails->date_to;?>">
    <input type="hidden" name="loc" id="loc" value="<?php echo $so_datails->location_id;?>">
    <input type="hidden" name="s_bill_address" id="s_bill_address" value="<?php echo $so_datails->s_billing_address;?>">
<div class= "form-group">
    <div class = "row">
         <div class="table table-responsive">
                <input type="hidden" name="id" id="id" value="<?php echo sizeof($supplyingorderList);?>">
                <table class="table table-bordered table-striped table-hover dataTable" id="supplyingorder">
                    <thead>
                        <tr>
                            <th>Item/ අයිතමය/ பொருள்</th>
                            <th>Unit Price (Rs.)/ඒකක මිල (රු.)/ அலகு விலை(ரூ.)</th>
                            <th>Quantity/ ප්‍රමාණය/ அளவு</th>
                            <th>Total(Rs.)/ එකතුව (රු.)/ மொத்தம்(ரூ.)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="addvalues" class="addvalues">
                        <?php 
                          if($supplyingorderList){
                            $i = 1;
                            $gttl = 0;
                            foreach($supplyingorderList as $blst){
                            $suttl =  $blst->buyingprice*$blst->sitem_quantity;  
                            $gttl +=$suttl;
                        ?>
                        <tr class="row<?php echo $i;?>">
                            <td><?php echo $blst->item;?><input type="hidden" id="subttlval<?php echo $i;?>" value="<?php echo $suttl;?>"><input type="hidden" name="catid<?php echo $i;?>" value="<?php echo $blst->item_i_id;?>"></td>
                            <td><input type="text" class="form-control" readonly="readonly" name="buyprice<?php echo $i;?>" id="buyprice<?php echo $i;?>" value="<?php echo $blst->buyingprice;?>"></td>
                            <td><input type="text" name="qty<?php echo $i;?>" id="qty<?php echo $i;?>" data-idval="<?php echo $i;?>" data-sellamt="<?php echo $blst->buyingprice;?>" class="qty" value="<?php echo $blst->sitem_quantity;?>"></td>
                            <td id="subttls<?php echo $i;?>"><?php echo $suttl;?></td>
                            <td><button class="btn btn-danger btn-sm del_item" id="<?php echo $i;?>">Delete</button></td>
                        </tr>
                        <?php 
                         $i++;
                           }
                          }
                        ?>
                    </tbody>
                   <!-- <tfoot>
                        <tr>
                            <td>Grand total</td>
                            <td><input type="text" name="gtotal" id="gtotal" value="0" readonly="readonly"></td>
                        </tr>
                    </tfoot> -->
</table>
    </div>
</div>
  <div class = "row">
        <div class= "required col-md-2 col-md-offset-8">
            <?php echo form_label("Grand total (Rs.)/ මුළු එකතුව (රු.)/ மொத்தம் (ரூ.)")?>
        </div>
        <div class= "col-md-2 col-md-offset-0">
            <input class=form-control type="text" name="gtotal" id="gtotal" value="<?php echo $gttl;?>" readonly="readonly">
        </div>
    </div>
    <br>


<div class = "row">
    <div class= "col-md-2 col-md-offset-4">
        <?php echo form_submit(array('value' => 'Update','class'=>'btn btn-primary form-control'))?>
    </div>
    <div class= "col-md-2 col-md-offset-0">
        <?php echo form_reset(array('value' => 'Clear','class'=>'btn btn-block btn-default btn-sm'))?>
    </div>
</div>

</div>

    <?php echo form_close()?>
</div>
</br>



</div>
</div>



</section>
<!-- /.content -->


    <script type="text/javascript">

    $(document).ready(function(){
           
         //  var supplier_id = $('#supplier_id').val(); //onload supplier_id show supplier items
          var supplier_id = '<?php echo $this->session->userdata('employee_id')?>';
           console.log(supplier_id);
           if(supplier_id){
            supplier_items(supplier_id); //calling for function supplier_items
           }

            //using select2 dropdown
          //  $("#employee_id").select2();
            $("#location_id").select2();
         //   $("#item_id").select2();
            $("#supplier_id").select2();
             $("#item_i_id").select2();

            //function call for on change of item_id
   /*         $('#item_id').on('change', function() {

                //if the item_id != to null
                if (this.value != "") {
                    //call for the getById method in item controller
                    $.ajax({
                        url : "<?php echo base_url('/item/getById');?>",
                        method: 'POST',
                        //getdate by id
                        data: {id : this.value},
                        //the data parse to the response variable
                        success : (function(response){

                            var data = JSON.parse(response);

                            $("#category").val(data.category.category);
                          
                            
                        }),
                        //output in console if have error massage 
                        error : (function(error){
                            console.log(error);
                        })
                    });
                }else{
                    //setting valuses when the ajax not working
                    $("#category").val("");
                

                };//end of the else
            });//end of the onchange function */

     //function call for on change of supplier_id
       $('#supplier_id').change(function(){
        $('#item_i_id').html("");
          var supplier_id = $('#supplier_id').val();
          //alert(supplier_id)
          supplier_items(supplier_id);
       });

       //function supplier_item for onload
       function supplier_items(supplier_id){ 
         $.ajax({
                                type: 'POST',
                                url:"<?php echo base_url('/supplyingorder/get_supplier_items');?>",
                                dataType: 'json',
                                //getsupplier by id
                                data:{'supplier_id':supplier_id},
                                success: function(response){
                                  console.log(response);
                                  $.each(response, function( index, value ) {
                                   
                                  $('#item_i_id').append("<option value='"+value.i_id+"' data-buyprice='"+value.buyingprice+"' data-itemname='"+value.item+"'>"+value.item+"</option>"); 
                                  });          
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }
              });
       }

       $('#date_to').change(function(){
        var date_from =$('#date_from').val();
        var date_to = $('#date_to').val();
        if(date_from>=date_to){
            alert("To date Cannot be previous date to date from")
            $('#date_to').val("");
        }else{
            $('#tod').val(date_to);
        }
       });

        $('#date_from').change(function(){
        var date_from =$('#date_from').val();
        
        
            $('#fromd').val(date_from);
       
       });



       // add item
       $('#add_new').click(function(){

         
         var supplier_id = $('#supplier_id').val();
         var date_from = $('#date_from').val();
         var date_to = $('#date_to').val();
         var location_id = $('#location_id').val();
         var s_billing_address = $('#s_billing_address').val();

          //validation after clicking additem button

         if(supplier_id==""){
            $('#suppliererror').html("Please Select supplier")
         }else{
            if(date_from==""){
             $('#suppliererror').html("")   
             $('#datefromerror').html("Please Select date")
            }else{
              if(date_to==""){
                $('#suppliererror').html("")   
                $('#datefromerror').html("")
                $('#datetoerror').html("Please Select date")  
              }else{
                if(location_id==""){
                  $('#suppliererror').html("")   
                  $('#datefromerror').html("")
                  $('#datetoerror').html("")
                  $('#locationerror').html("Please Select Location")
                }else{
                    if(s_billing_address==""){
                      $('#suppliererror').html("")   
                      $('#datefromerror').html("")
                      $('#datetoerror').html("")
                      $('#locationerror').html("")
                      $('#sbillingaddresserror').html("Please Enter Billing Address")
                }else{
                       //add item
                         var item_i_id = $('#item_i_id').val();
                         var buyprice = $('#item_i_id').find(':selected').attr('data-buyprice');
                         var itemname = $('#item_i_id').find(':selected').attr('data-itemname');
                         var quantity = $('#quantity').val();

                         var gtotal = $('#gtotal').val();
                         
                       //   $('#supplierid').val(supplier_id);
                         $('#fromd').val(date_from);
                         $('#tod').val(date_to);
                         $('#loc').val(location_id); 
                         $('#s_bill_address').val(s_billing_address);    

                         var newgtotal = parseFloat(gtotal)+(parseFloat(buyprice)*parseFloat(quantity));
                         $('#gtotal').val(newgtotal);
                         
                         var id  = $('#id').val();
                         var newid = parseInt(id)+1;
                         $('#id').val(newid);

                         result = addrow(newid,itemname,item_i_id,buyprice,quantity);
                         $('.addvalues').append(result);
                         $('#quantity').val(""); // clear quantity after adding
                }
              }  
            }
           }
         }  

         
        

       });

       function addrow(id,itemname,item_i_id,buyprice,quantity){
        var subttl = buyprice*quantity;
        result = '<tr class="row'+id+'"><td>'+itemname+'<input type="hidden" id="subttlval'+id+'" value="'+subttl+'"><input type="hidden" name="catid'+id+'" value="'+item_i_id+'"></td><td><input type="text" class="form-control" readonly="readonly" name="buyprice'+id+'" id="buyprice'+id+'" value="'+buyprice+'"></td><td><input type="text" name="qty'+id+'" id="qty'+id+'" data-idval="'+id+'" data-buyamt="'+buyprice+'" class="qty" value="'+quantity+'"></td><td id="subttls'+id+'">'+subttl+'</td><td><button class="btn btn-danger btn-sm del_item" id="'+id+'">Delete</button></td></tr>';
        return result;
       }


       $('body').on('click','.del_item',function(){
        var id  = $(this).attr('id');
        var subttlval = $('#subttlval'+id).val();
        var gtotal = $('#gtotal').val();
        var newttl = parseFloat(gtotal)-parseFloat(subttlval);
        $('#gtotal').val(newttl);
        $('.row'+id).remove();
       })

        $('body').on('keyup','.qty',function(){
           var id  = $(this).attr('data-idval');
           var buyprice  = $(this).attr('data-buyamt');
           var newqty = $(this).val();
          

           var subttl = buyprice*newqty;
           $('#subttls'+id).html(subttl);

        });

        $('#myform').submit(function (evt) {
            
         var supplier_id = $('#supplier_id').val();
         var date_from = $('#date_from').val();
         var date_to = $('#date_to').val();
         var location_id = $('#location_id').val();
         var s_billing_address = $('#s_billing_address').val();
         var item_i_id = $('#item_i_id').val();
         var quantity = $('#quantity').val();

//validation after clicking save button

        if(supplier_id==""){
            evt.preventDefault();

            $('#suppliererror').html("Please Select Supplier")
         }else{
            if(date_from==""){
                evt.preventDefault();

             $('#suppliererror').html("")   
             $('#datefromerror').html("Please Select date")
            }else{
              if(date_to==""){
                evt.preventDefault();

                $('#suppliererror').html("")   
                $('#datefromerror').html("")
                $('#datetoerror').html("Please Select date")  
              }else{
                if(location_id==""){
                    evt.preventDefault();

                  $('#suppliererror').html("")   
                  $('#datefromerror').html("")
                  $('#datetoerror').html("")
                  $('#locationerror').html("Please Select Location")
                }else{
                    if(s_billing_address==""){
                        evt.preventDefault();

                      $('#suppliererror').html("")   
                      $('#datefromerror').html("")
                      $('#datetoerror').html("")
                      $('#locationerror').html("")
                      $('#sbillingaddresserror').html("Please Enter Billing Address")
                }else{
                    if($('#id').val()==0){
                        evt.preventDefault();
                         $('#suppliererror').html("")   
                  $('#datefromerror').html("")
                  $('#datetoerror').html("")
                  $('#locationerror').html("")
                  $('#sbillingaddresserror').html("")
                    alert("Please select Item and Quantity")
                    }else{
                       $('#myform').submit(); 
                    }
                        
                }
              }  
            }
           } 
         } 

        });


        });//end of the document.ready function
</script>

