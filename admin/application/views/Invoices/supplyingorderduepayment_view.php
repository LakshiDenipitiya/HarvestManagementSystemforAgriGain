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
          <td colspan="3" align="center"><strong>Due Payment Invoices</strong><p>for Supplying Order No:<?php echo $so_details->so_id;?></p></td>

		</tr>
		<tr><p><strong><h3 align="center" style="color:red;">Please settle the due payment. Thank You!</h3></strong></p>
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
          <td><?php echo $so_details->location;?></td>
          <td>&nbsp;</td>
		</tr>
        
      

		          <td align="right"><strong>Grand Total (Rs.)</strong></td>
          		  <td align="right"><strong><?php echo $bo_details->bo_grand_total;?></strong></td>
				</tr>
				<tr>
		   
		          <td align="right"><strong>Advance Payment (Rs.)</strong></td>
          		  <td align="right"><strong><?php echo ($bo_details->bo_grand_total*70/100);?></strong></td>
				</tr>
          </td>
      
       </tr>
       <tr></tr>
       <tr></tr>
       <tr>
          <td></td>
    		<td></td>

          <td><button onclick="window.print()" id="printbtn">Print Due Payment Invoice</button></td>
       </tr>


	</table>
</body>
</html>