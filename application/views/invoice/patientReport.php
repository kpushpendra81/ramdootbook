<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>CUSTOMER SLIP</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
	<style type="text/css">
		body { font: 14px/1.4 Arial, Helvetica, sans-serif; font-weight: bold; }
	</style>
</head>

<body>

	<div id="page-wrap">

		<textarea id="header">BILL INVOICE</textarea>
		<table style="width: 100%">
			<tr>
				<td width="10%" style="border: none;">
					<!-- 
					<img src="<?php echo base_url();?>assets/images/empImage/<?php echo $this->session->userdata("photo");?>" alt="" width="100" />
					 -->
				</td>
				<td style="border: none;">
					<h1 align="center" style="text-transform:uppercase;"><?php echo $info->cilnic_name; ?></h1>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->address_1; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number.", ";} ?>
			            <?php echo "Mobile : ".$info->mobile_number; ?>
			        </h3>
				</td>
			</tr>
		</table>
		
        
		<div style="clear:both"></div>
		
		<div style="clear:both"></div>
		
		<div id="customer">
        	<div style="display:inline-block;">
            <table>
            	<?php if($is_customer):?>
                    <tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	<td style="border:none;"><strong>Name : </strong><?php echo $c_detail->p_name;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Address : </strong><?php echo $c_detail->address;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Mobile No : </strong><?php echo $c_detail->mobile;?></td>
                    </tr>
                   
                    <tr>
                    	<td style="border:none;"><strong>Gender : </strong><?php echo $c_detail->gender; ?></td>
                    </tr>
                <?php else:?>
                	<tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	
                    </tr>
                <?php endif;?>
            </table>
            </div>
            
			<div class="printcontent" >
			  <div style="display:inline-block; float:right">
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h3>Service Details</h3></td>
                </tr>
                <tr>
                    <td class="meta-head">
                    	Reciept No.
                    </td>
                    <td><?php echo $this->uri->segment(4);?></td>
                </tr>
                <tr>
                    <td class="meta-head">Date</td>
                    <td><?php echo date("d-M-Y"); ?></td>
                </tr>
            </table>
            </div>
		
		</div>
		
		<table id="items">
		
		  <tr>
		       <th width="5%">No.</th>
               <th width="12%">Service</th>
               <th width="30%">Pay Mode</th>
               <th width="12%">Total Price</th>
               <th width="11%">Sub Total</th>
		  </tr>
		  <?php 
		  	$i = 1;
		  $this->db->where("invoice_no",$invoiceid);
		 $printdata= $this->db->get("day_book")->row();
		  ?>
		  <tr class="item-row">
		      <td width="5%"><?php echo $i; ?></td>
		      
		      <td width="30%" align="center"><?php echo $printdata->reason;?></td>
		      <td width="15%" align="center">
		      	<?php 
		      		 $this->db->where("invoice_id",$invoiceid);
					 $pro= $this->db->get("treatement")->row();
					  echo $printdata->pay_mode;
		      	?>
		      </td>
		      <td width="12%" align="center"><?php echo $printdata->amount; ?></td>
		      <td width="11%" align="center"><?php echo $printdata->amount; ?></td>
		     
             
		  </tr>
	  	 
		  <tr>
		      <td colspan="3" align="right"><strong>Total</strong></td>
		      <td colspan="2"><?php echo $printdata->amount; ?></td>
		      
		  </tr>
          
		  <tr>
		      <td class="total-line" colspan="2"><strong>Amount Paid</strong></td>
		      <td class="total-value"><div id="total"><?php echo $printdata->amount; ?></div></td>
              <td class="total-line" colspan="4"><strong>Balance Due</strong></td>
		      <td class="total-value"><div id="total"><?php 
		       	$this->db->where("patient_id",$printdata->paid_to);
		     	if($bal=$this->db->get("procedure")->row()) {
		     	if($bal->current_due) {echo $bal->current_due;}else{ echo "0.00";}} else { echo "0.00";}?></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
	</div>
</body>

</html>
			
	
    
    <script>
		jQuery(document).ready(function(){
			$("#plain").click(function(){
				$("#customer").css("padding-top", "0px");
				$("#headerP").attr('class', 'printcontent');
				window.print();
			});
		});
    </script>
    
    


