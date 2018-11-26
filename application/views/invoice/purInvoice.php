<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>TAX Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

	
	 <script>
        function convert_number(number)
        {
            if ((number < 0) || (number > 999999999))
            {
                return "Number is out of range";
            }
            var Gn = Math.floor(number / 10000000);  /* Crore */
            number -= Gn * 10000000;
            var kn = Math.floor(number / 100000);     /* lakhs */
            number -= kn * 100000;
            var Hn = Math.floor(number / 1000);      /* thousand */
            number -= Hn * 1000;
            var Dn = Math.floor(number / 100);       /* Tens (deca) */
            number = number % 100;               /* Ones */
            var tn= Math.floor(number / 10);
            var one=Math.floor(number % 10);
            var res = "";

            if (Gn>0){
                res += (convert_number(Gn) + " Crore");
            }
            if (kn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(kn) + " Lakhs");
            }
            if (Hn>0){
                res += (((res=="") ? "" : " ") +
                    convert_number(Hn) + " Thousand");
            }

            if (Dn){
                res += (((res=="") ? "" : " ") +
                    convert_number(Dn) + " hundred");
            }


            var ones = Array("", "One", "Two", "Three", "Four", "Five", "Six","Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen","Nineteen");
            var tens = Array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty","Seventy", "Eigthy", "Ninety");

            if (tn>0 || one>0)
            {
                if (!(res==""))
                {
                    res += " and ";
                }
                if (tn < 2)
                {
                    res += ones[tn * 10 + one];
                }
                else
                {

                    res += tens[tn];
                    if (one>0)
                    {
                        res += ("-" + ones[one]);
                    }
                }
            }

            if (res=="")
            {
                res = "zero";
            }
            return res;
        }

    </script>
</head>

<body>

	<div id="page-wrap">

		<textarea >TAX INVOICE</textarea>
		<table style="width: 100%">
			<tr>
				<td width="10%" style="border: none;">
					<!-- 
					<img src="<?php echo base_url();?>assets/images/empImage/<?php echo $this->session->userdata("photo");?>" alt="" width="100" />
					 -->
				</td>
				<td style="border: none;">
					<h1 align="center" style="text-transform:uppercase;"><?php echo $det->product_company_name; ?></h1>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $det->dealer_address; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($det->dealar_mobile1 > 0 )){echo "Phone : ".$det->dealar_mobile1.", ";} ?>
			            <?php echo "Mobile : ".$det->dealar_mobile1; ?>
			        </h3>
			         <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($det->tin_no > 0 )){echo "Company's GST No. : ".$det->Gst." ";} ?>
			           
			        </h3>
				</td>
			</tr>
		</table>
		
        
		<div style="clear:both"></div>
		
		<div style="clear:both"></div>
		
		<div id="customer" >
        	<div style="display:inline-block; float:left">
            <table>
            	<?php $this->db->where("clinic_id",$this->session->userdata("clinic_id"));
				$info = $this->db->get("general_settings")->row(); ?>
                    <tr><td style="border:none;"><strong>To</strong></td></tr>
                    <tr>
                    	<td style="border:none;"><strong>Name : </strong><?php echo $info->cilnic_name;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Address : </strong><?php echo $info->address_1;?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>Mobile No : </strong><?php echo $info->phone_number.", ".$info->mobile_number;?></td>
                    </tr>
                   
                      <tr>
                    	<td style="border:none;"><strong>GST Number : </strong><?php echo $info->fax_number;?></td>
                    </tr>
                     <tr>
                    	<td style="border:none;"><strong>PAN NO.: </strong><?php echo "AHOPG5925H";?></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><strong>EMAILID: </strong><?php echo "zapcomputersales@gmail.com";?></td>
                    </tr>
                	
             
            </table>
			</div>
			
			
			
            <div style="display:inline-block; float:right">
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h3>Purchase Order</h3></td>
                </tr>
                <tr>
                    <td class="meta-head">
                    	Bill No.
                    </td>
                    <td><?php echo $this->uri->segment(3);?> </td>
                </tr>
                <tr>
                    <td class="meta-head">Date</td>
                    <td><?php echo date("d-M-Y", strtotime($det->date1)); ?></td>
                </tr>
            </table>
            </div>
           
				
		
		</div>
		 <?php $this->db->where("reff_bill_num",$this->uri->segment(3));
		  		$printvat = $this->db->get("enter_stock1")->result();?>
		<table id="items" style="border: 1px solid #000;">
		
		  <tr style="border: 1px solid #000;">
		       <th width="5%" style="border: 1px solid #000;">No.</th>
              
               <th width="30%" style="border: 1px solid #000;">Product Description</th>
              <th width="9%" style="border: 1px solid #000;">HSN/SAC</th>
               <th width="9%" style="border: 1px solid #000;">Quantity</th>
               <th width="11%" style="border: 1px solid #000;">Unit Price</th>
              
                <th width="10%" style="border: 1px solid #000;">CGST</th>
                 <th width="10%" style="border: 1px solid #000;">SGST/UTGST</th>
                <th width="10%" style="border: 1px solid #000;">IGST</th>
                <th width="10%" style="border: 1px solid #000;">Discount</th>
               <th width="12%" style="border: 1px solid #000;">Total Price</th>
              
		  </tr>
		 <?php $i=1 ; $tot =1; foreach($printvat as $p):?>
		  <tr class="item-row">
		      <td style="border: 1px solid #000;"><?php echo $i; ?></td>
		     
		      <td style="border: 1px solid #000;"><?php echo $p->name." ".$p->company_name; ?>
		      <?php $this->db->where("product_name",$p->name);
		      $this->db->where("bill_number",$this->uri->segment(3));
		     $rty =  $this->db->get("stock_serial");
		      if($rty->num_rows()>0){ $cj=1;
		      	foreach($rty->result() as $t):
		      	echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;".$cj.")-".$t->pro_serial;
		      	$cj++;
		      	endforeach;
		     
}			?></td>
               <td style="border: 1px solid #000;">
               <?php 
		   	$this->db->distinct();
		   	$this->db->select("hsn_sac");
              $this->db->where("product_name",$p->name);
		      $this->db->where("bill_number",$this->uri->segment(3));
		     $rty =  $this->db->get("stock_serial");
		      if($rty->num_rows()>0){ $cj=1;
		      	foreach($rty->result() as $t):
		      	echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;".$t->hsn_sac;
		      	$cj++;
		      	endforeach;}
		      	else{
					echo $p->hsn_sac;
			}
               ?></td>
		      <td style="border: 1px solid #000;"><?php $q= $p->extraQuantity; echo $p->extraQuantity; ?></td>
		      <td style="border: 1px solid #000;"><?php $up=$p->pRate; echo $p->pRate; ?></td>
		         <td style="border: 1px solid #000;"><?php echo $p->vat;?></td>
		         <td style="border: 1px solid #000;"><?php echo $p->sat;?></td>
		          <td style="border: 1px solid #000;"><?php echo "0.00";?></td>
		         <td style="border: 1px solid #000;"><?php echo $p->discount;?></td>
		         <?php $fg=(($p->pRate*$p->extraQuantity)*$p->discount)/100;?>
              <td style="border: 1px solid #000;"><?php $tot =  ($p->pRate*$p->extraQuantity)-$fg; echo round($tot) ; ?></td>
		      
		  </tr>
		  <?php $i++ ; endforeach;?>
	  	
		 
		  <tr>
		  <td class="total-line" colspan="5"><strong>Output CGST </strong></td>
		 
		      <td class="total-value" ><div id="total"><?php echo $det->vatper."%"; ?></div></td>
		       <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		     
		      <td class="total-value"><div id="total"></div></td>
		      <td style="border: 1px solid #000;"><div id="total"></div><?php $vat = ($det->vatper*$tot)/100; echo round($vat);?></td>
		      </tr>
		      <tr>
		       <td class="total-line" colspan="5"><strong>Output SGST/UTGST </strong></td>
		      <td class="total-value"><div id="total"><?php echo $det->satper."%"; ?></div></td>
		      <td class="total-value"><div id="total"></div></td>
		   
		      <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td style="border: 1px solid #000;"><div id="total"></div><?php $vas = ($det->satper*$tot)/100; echo round($vas);?></td>
		      </tr>
		      
		   
		  
		  </tr>
		     <tr>
              <td class="total-line" colspan="5"><strong>Balance Due</strong></td>
               <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		    
		      <td class="total-value"><div id="total"></div></td>
		       <td class="total-value"><div id="total"></div></td>
		      <td style="border: 1px solid #000;"><div id="total"><?php echo round($det->balance); ?></div></td>
		  
		  </tr>
		   <tr>
		      <td colspan="9" align="center" style="border: 1px solid #000;"><strong>Total</strong></td>
		       
		      <td style="border: 1px solid #000;" ><?php echo round($det->total_prize); ?></td>
		  </tr>
          
		  <tr>
		      <td colspan="9" align="center" style="border: 1px solid #000;"><strong>Amount Paid</strong></td>
		      
		      <td style="border: 1px solid #000;"><div id="total"><?php echo round($det->amount_paid); ?></div></td>
             
		  </tr>
		
		</table>
		</br>
		<div> Paid Amount in words : <div class="number"></div><script> document.write(convert_number(<?php echo round($det->amount_paid); ?>)); </script> Rupee Only/-</strong>
	           </div>
		
		<div >
		</br>
		</br>
		<h3>BANK NAME:</h3>UNION BANK OF INDIA
		<h3>ACCOUNT NUMBER:</h3>302601010780085
		<h3>IFSC CODE:</h3>UBIN0530263
		<h3>ADDRESS:</h3>SARVODAYA NAGAR, KANPUR 
		</br>
		</br>
		</br>
		<div style="margin-left: 500px  ; margin-top:-200px">
		</br>
		</br>
		<h3>BANK NAME:</h3>INDIAN OVERSEAS BANK
		<h3>ACCOUNT NUMBER:</h3>178633000000020 
		<h3>IFSC CODE:</h3>IOBA0001786
		<h3>ADDRESS / PIN NO.:</h3>BURRA KANPUR, 208027
		
		</div>
		  <div>
		  <h3>Terms & conditions :</h3>
		  1). Goods once sold will not be taken back</br>
		  2). If the payment will not be made on due date the interest @24% per annum shall be charged</br>
		 <b> Declaration</b></br>
		  We declare that this invoice shows the actual price of the goods described and that all perticulars are true and correct.NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.
		</div>
		</br>
		</br>
		</br>
		</br>
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Reciept
        </button>
    </div>
	</div>
</body>

</html>