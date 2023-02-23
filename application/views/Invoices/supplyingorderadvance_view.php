<html>
<head>
<style type="text/css">
		table{
			font-size: 22px;
		}

		@media print {
    #printbtn {
        display :  none;
    }
}
		
	  </style>

</head>

<body>
	<div class="box-header with-border">
            <h3 class="box-title"><a href="<?php echo base_url() ?>/Manageorderstatus/index_all_fullview/">
                <button class="btn btn-primary btn-sm">Go back</button>
            </a></h3>
             
             </div>

	<table align="center">
		<tr>
          <td colspan="3" align="center"><strong>AgriGain</strong></td>

		</tr>
		<br>
		<tr>
          <td colspan="3" align="center"><strong>Advance Payment Invoices</strong><p>for Supplying Order No: <?php echo $so_details->so_id;?></p></td>

		</tr>
			
		<tr><p><strong><h3 align="center" style="color:red;">Please make the advance payment to the account no:204500100096346 <br>People's Bank - Havelock city</h3></strong></p>
		</tr>
		<tr>
          <td colspan="3">&nbsp;</td>
		</tr>
		<tr>
          <td>Supplying Order</td>
          <td><?php echo $so_details->so_id;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Supplier Name</td>
          <td><?php echo $so_details->title." ".$so_details->firstname." ".$so_details->lastname;?></td>
          <td>&nbsp;</td>
		</tr>
		<!--<tr>
          <td>Supplier Address</td>
          <td><?php echo $so_details->no." ".$so_details->lane." ".$so_details->city;?></td>
          <td>&nbsp;</td>
		</tr> -->
		<tr>
          <td>Phone No</td>
          <td><?php echo $so_details->phoneno;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Location</td>
          <td><?php echo $so_details->location;?></td>
          <td>&nbsp;</td>
		</tr>
        
        <tr>
          <td colspan="3"><hr></td>
		</tr>

       <tr>
          <td colspan="3"> 
          	  <table border="1" cellpadding="10px">
          	  	<tr>
		          <td>Buyer Order Id</td>
		          <td>Buyer Name</td>
		          <td>Phone No</td>
		          <td>Item</td>
		          <td>Quantity</td>
		          <td>Price(Rs.)</td>
		          <td>Sub Total</td>
				</tr>
				     <?php
                 foreach($so_bo_details as $rec){
                 ?>
	                 <tr>
			          <td><?php echo $rec->buyerorder_boi_id;?></td>
			          <td><?php echo $rec->title." ".$rec->firstname." ".$rec->lastname;?></td>
			          <td><?php echo $rec->phoneno;?></td>
			          <td><?php echo $rec->item;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy;?></td>
			          <td align="right"><?php echo $rec->buyingprice;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy*$rec->buyingprice;?></td>
					</tr>
                 <?php
                 }
                ?>

                <tr>
		          
		          <td colspan=6 align="right"><strong>Grand Total</strong></td>
          		  <td align="right"><strong><?php echo $so_details->so_grand_total;?></strong></td>
				</tr>
				<tr>
		          
		          <td colspan=6 align="right"><strong>Advance Payment</strong></td>
          		  <td align="right"><strong><?php echo ($so_details->so_grand_total*30/100);?></strong></td>
				</tr>
          	  </table>
          </td>
      
       </tr>

       <tr>
          <td></td>
		  <td></td>
          <td><button onclick="window.print()" id="printbtn">Print this page</button></td>
       </tr>


	</table>
</body>
</html>