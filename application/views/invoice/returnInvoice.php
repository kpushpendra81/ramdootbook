<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Sale Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">RETURN BILL INVOICE</textarea>
		<table style="width: 100%">
			<tr>
				<td style="border: none;" align="center">
					<h1>RETURN BILL INVOICE</h1>
				</td>
			</tr>
		</table>        
		<div style="clear:both"></div>
		<hr/>
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div style="display:inline-block;">
            <table>
            	<?php if($is_customer):?>
                    <tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	<td style="border:none;"><strong>Name : </strong><?php echo $c_detail->c_name;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Address : </strong><?php echo $c_detail->address;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Mobile No : </strong><?php echo $c_detail->mobile;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Company Belongs to : </strong><?php echo $c_detail->company_name;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Email : </strong><?php echo $c_detail->email;?></td>
                    </tr>
                <?php else:?>
                	<tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	<td style="border:none;"><?php echo $total_info->customar_id;?></td>
                    </tr>
                <?php endif;?>
            </table>
			</div>
            <div style="display:inline-block; float:right">
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h3>Return Order</h3></td>
                </tr>
                <tr>
                    <td class="meta-head">
                    	Reciept No.
                    </td>
                    <td><?php echo $this->uri->segment(3);?></td>
                </tr>
                <tr>
                    <td class="meta-head">Date</td>
                    <td><?php echo date("d-M-Y", strtotime($total_info->date)); ?></td>
                </tr>
            </table>
            </div>
		
		</div>
		
		<table id="items">
		
		  <tr>
		       <th width="5%">No.</th>
               <th width="12%">Item Code</th>
               <th width="30%">Description</th>
               <th width="9%">Quantity</th>
               <th width="11%">Unit Price</th>
               <th width="10%">Discount</th>
               <th width="12%">Total Price</th>
               <th width="11%">Sub Total</th>
		  </tr>
		  <?php 
		  	$i = 1;
		  	$count_dis = 0;
		  	$count_total = 0;
		  	$count_sub_total = 0;
		  	foreach ($pro_detail as $row):
		  		$count_dis = $count_dis + $row->discount_rate;
		  		$count_total = $count_total + $row->total;
		  		$count_sub_total = $count_sub_total + $row->sub_total;
		  ?>
		  <tr class="item-row">
		      <td><?php echo $i; ?></td>
		      <td><?php echo $row->product_id;?></td>
		      <td>
		      	<?php 
		      		$this->db->where("item_no",$row->product_id);
		      		$pro = $this->db->get("enter_stock")->row();
		      		
		      		echo $pro->name.", ".$row->company_name.", ".$pro->size_power.", ".$pro->batch_no;
		      	?>
		      </td>
		      <td><?php echo $row->product_quantity; ?></td>
		      <td><?php echo $row->prise_per_pro; ?></td>
		      <td><?php echo $row->discount_rate; ?></td>
              <td><?php echo $row->total; ?></td>
		      <td><?php echo $row->sub_total; ?></td>
		  </tr>
	  	  <?php endforeach;?>
		  <tr>
		      <td colspan="3" align="right"><strong>Total</strong></td>
		      <td colspan="2"><?php echo $total_info->total; ?></td>
		      <td><?php echo $count_dis; ?></td>
              <td><?php echo $count_total; ?></td>
		      <td><?php echo $count_sub_total; ?></td>
		  </tr>
          
		  <tr>
		      <td class="total-line" colspan="2"><strong>Amount Refund</strong></td>
		      <td class="total-value"><div id="total"><?php echo $total_info->paid; ?></div></td>
		      <td class="total-line" colspan="2"><strong>Previous Balance</strong></td>
		      <td class="total-value"><div><?php echo $total_info->pri_balance; ?></div></td>
              <td class="total-line" ><strong>Balance Due</strong></td>
		      <td class="total-value"><div id="total"><?php echo $total_info->balance; ?></div></td>
		  </tr>
		
		</table>
		
		
	<div class="invoice-buttons" align="center">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
	</div>
</body>

</html>