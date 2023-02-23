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

	
	<table align="center">
		<tr>
          <td colspan="3" align="center"><strong>AgriGain</strong></td>

		</tr>
		<br>
		<tr>
          <td colspan="3" align="center"><strong>Goods Receive Notice</strong><p>for Supplying Order No:<?php echo $bo_details->supplierorder_soi_id;?></p></td>

		</tr>
		<tr>
          <td colspan="3">&nbsp;</td>
		</tr>
		<tr>
          <td>GRN no</td>
          <td><?php echo $bo_details->grn;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Supplying Order</td>
          <td><?php echo $bo_details->supplierorder_soi_id;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Supplier Name</td>
          <td><?php echo  $so_details->title." ". $so_details->firstname." ". $so_details->lastname;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Supplier Billing Address</td>
          <td><?php echo  $so_details->s_billing_address;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Phone No</td>
          <td><?php echo  $so_details->phoneno;?></td>
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
		          <td>Buying Order Id</td>
		          <td>Buyer Name</td>
		          <td>Item</td>
		          <td>Quantity</td>
		          <td>Price(Rs.)</td>
		          <td>Sub Total (Rs.)</td>
				</tr>
              
              
	                 <tr>
			          <td><?php echo $bo_details->buyerorder_boi_id;?></td>
			          <td><?php echo $bo_details->title." ". $bo_details->firstname." ". $bo_details->lastname;?></td>
			          <td><?php echo  $bo_details->item;?></td>
			          <td align="right"><?php echo  $bo_details->bs_quanitiy;?></td>
			          <td align="right"><?php echo  $bo_details->buyingprice;?></td>
			          <td align="right"><?php echo  $bo_details->bs_quanitiy*$bo_details->buyingprice;?></td>
					</tr>
					<tr>

						 <td colspan=5 align="right"><strong>Total (Rs.)</strong></td>
          		  <td align="right"><strong><?php echo  $bo_details->bs_quanitiy*$bo_details->buyingprice;?></strong></td>
					</tr>
 
          	  </table>
          </td>
      
       </tr>
       <tr></tr>
       <tr></tr>
       <tr></tr>
       <tr>
          <td></td>
		  <td></td>
          <td><button onclick="window.print()" id="printbtn">Print GRN</button></td>
       </tr>


	</table>

	

	
</body>
</html>