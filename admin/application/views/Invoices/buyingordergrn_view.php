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
          <td colspan="3" align="center"><strong>Goods Receive Notice</strong><p>for Buying Order No:<?php echo $bo_details->bo_id;?></p></td>

		</tr>
		<tr>
          <td colspan="3">&nbsp;</td>
		</tr>
		<tr>
          <td>GRN no</td>
          <td><?php echo $so_details->grn;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Buying Order</td>
          <td><?php echo $bo_details->bo_id;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Buyer Name</td>
          <td><?php echo  $bo_details->title.". ". $bo_details->firstname." ". $bo_details->lastname;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Buyer Address</td>
          <td><?php echo  $bo_details->no.", ". $bo_details->lane.", ". $bo_details->city;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Phone No</td>
          <td><?php echo  $bo_details->phoneno;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Location</td>
          <td><?php echo $bo_details->location;?></td>
          <td>&nbsp;</td>
		</tr>
        
        <tr>
          <td colspan="3"><hr></td>
		</tr>

       <tr>
          <td colspan="3"> 
          	  <table border="1" cellpadding="10px">
          	  	<tr>
		          <td>Supplier Order Id</td>
		          <td>Supplier Name</td>
		          <td>Supplier Billing Address</td>
		          <td>Item</td>
		          <td>Quantity</td>
		          <td>Price(Rs.)</td>
		          <td>Sub Total (Rs.)</td>
				</tr>
              
              
	                 <tr>
			          <td><?php echo $so_details->supplierorder_soi_id;?></td>
			          <td><?php echo $so_details->title.". ". $so_details->firstname." ". $so_details->lastname;?></td>
			          <td><?php echo  $so_details->s_billing_address;?></td>
			          <td><?php echo  $so_details->item;?></td>
			          <td align="right"><?php echo  $so_details->bs_quanitiy;?></td>
			          <td align="right"><?php echo  $so_details->sellingprice;?></td>
			          <td align="right"><?php echo  $so_details->bs_quanitiy*$so_details->sellingprice;?></td>
					</tr>
					<tr>

						 <td colspan=6 align="right"><strong>Total (Rs.)</strong></td>
          		  <td align="right"><strong><?php echo  $so_details->bs_quanitiy*$so_details->sellingprice;?></strong></td>
					</tr>
 
          	  </table>
          </td>
      
       </tr>

       <tr>
          <td></td>
		  <td></td>
          <td><button onclick="window.print()" id="printbtn">Print GRN</button></td>
       </tr>


	</table>

	

	
</body>
</html>