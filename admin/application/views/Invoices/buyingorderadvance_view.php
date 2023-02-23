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
          <td colspan="3" align="center"><strong>Advance Payment Invoices</strong><p>for Buying Order No: <?php echo $bo_details->bo_id;?></td>

		</tr>
		<tr><p><strong><h3 align="center" style="color:red;">Please make the advance payment to the account no:204500100096346 <br>People's Bank - Havelock city</h3></strong></p>
			</tr>
		<br>
		<tr>
          <td colspan="3">&nbsp;</td>
		</tr>
		<tr>
          <td>Buying Order</td>
          <td><?php echo $bo_details->bo_id;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Buyer Name</td>
          <td><?php echo $bo_details->title." ".$bo_details->firstname." ".$bo_details->lastname;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Buyer Address</td>
          <td><?php echo $bo_details->no." ".$bo_details->lane." ".$bo_details->city;?></td>
          <td>&nbsp;</td>
		</tr>
		<tr>
          <td>Phone No</td>
          <td><?php echo $bo_details->phoneno;?></td>
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
		          <td>Phone No</td>
		          <td>Item</td>
		          <td>Quantity</td>
		          <td>Price(Rs.)</td>
		          <td>Sub Total</td>
				</tr>
                <?php
              
                 foreach($bo_so_details as $rec){
                 ?>
	                 <tr>
			          <td><?php echo $rec->supplierorder_soi_id;?></td>
			          <td><?php echo $rec->title." ".$rec->firstname." ".$rec->lastname;?></td>
			          <td><?php echo $rec->phoneno;?></td>
			          <td><?php echo $rec->item;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy;?></td>
			          <td align="right"><?php echo $rec->sellingprice;?></td>
			          <td align="right"><?php echo $rec->bs_quanitiy*$rec->sellingprice;?></td>
					</tr>
                 <?php
                 }
                ?>

                <tr>
		          
		          <td colspan=6 align="right"><strong>Grand Total</strong></td>
          		  <td align="right"><strong><?php echo $bo_details->bo_grand_total;?></strong></td>
				</tr>
				<tr>
		          
		          <td colspan=6 align="right"><strong>Advance Payment</strong></td>
          		  <td align="right"><strong><?php echo ($bo_details->bo_grand_total*30/100);?></strong></td>
				</tr>
          	  </table>
          </td>
      
       </tr>
       <tr></tr>
       <tr></tr>
       <tr></tr>
       <tr></tr>
       <tr>
          <td></td>
		  <td></td>
          <td><button onclick="window.print()" id="printbtn">Print Advance Invoice</button></td>
       </tr>


	</table>
</body>
</html>