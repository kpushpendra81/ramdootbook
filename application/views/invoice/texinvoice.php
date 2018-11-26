<html xmlns="http://www.w3.org/1999/xhtml">
<style>
.tba {
    background: url(img_flwr.gif);
    background-size: 80px 60px;
    background-repeat: no-repeat;
}
</style>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Sale Invoice</title>
	
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

		<textarea id="header">TAX INVOICE</textarea>
		<table style="width: 100%" class='tba'>
			<tr>
				<td  style="border: none;">
					
					<img src="<?php echo base_url();?>assets/images/zaplogo.jpg" style="width:105px;height:80px;" />
					
				</td>
				<td style="border: none;">
					<h2 align="left" style="text-transform:uppercase; margin-left:50px;"><?php echo $info->cilnic_name; ?></h2>
			        <h4 align="left" style="font-variant:small-caps; margin-left:70px;">
						<?php echo $info->address_1; ?>
			        </h4>
			        <h4 align="left" style="font-variant:small-caps; margin-left:70px;">
						<?php if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number.", ";} ?>
			            <?php echo "Mobile : ".$info->mobile_number; ?>
			        </h4>
			         <h4 align="left" style="font-variant:small-caps; margin-left:80px;">
						<?php if(strlen($info->fax_number > 0 )){echo "Company's GST NO. : ".$info->fax_number." ";} ?>
			           
			        </h4>
			        <h4 align="left" style="font-variant:small-caps; margin-left:80px;">
						<?php echo "Emailid.:zapcomputersales@gmail.com" ?>
			           
			        </h4>
			         <h4 align="left" style="font-variant:small-caps; margin-left:80px;">
						<?php echo "Pan No.AHOPG5925H" ?>
			           
			        </h4>
				</td>
			</tr>
		</table>
		
        
		<div style="clear:both"></div>
		
		<div style="clear:both"></div>
		
		<div id="customer" >
        	<div style="display:inline-block; float:left">
            <table>
            	<?php if($is_customer):?>
                    <tr><td style="border:none;"><h5><strong>To</strong></h5></td></tr>
                    <tr>
                    	<td style="border:none;"><h5><strong>Name : </strong><?php echo $c_detail->p_name;?></h5></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><h5><strong>Address : </strong><?php echo $c_detail->address;?></h5></td>
                    </tr>
                    <tr>
                    	<td style="border:none;"><h5><strong>Mobile No : </strong><?php echo $c_detail->mobile;?></h5></td>
                    </tr>
                   
                   
                      <!--  <tr>
                    	<td style="border:none;"><h5><strong>GST NO. : </strong><?php echo $c_detail->bp_level;?></h5></td>
                    </tr>-->
                <?php else:?>
                	<tr><td style="border:none;"><h5><strong>To</strong></h5></td></tr>
                    <tr>
                    	<td style="border:none;"><h5><?php echo $total_info->customar_id;?></h5></td>
                    </tr>
                <?php endif;?>
            </table>
			</div>
			
			
			
            <div style="display:inline-block; float:right">
            <table>
                <tr>
                    <td class="meta-head" colspan="2"><h5>Purchase Order</h5></td>
                </tr>
                <tr>
                    <td class="meta-head">
                    	<h5>Reciept No.</h5>
                    </td>
                    <td><?php echo $this->uri->segment(3);?> </td>
                </tr>
                <tr>
                    <td class="meta-head"><h5>Date</h5></td>
                    <td><?php echo date("d-M-Y", strtotime($total_info->date)); ?></td>
                </tr>
                  <tr>
                    <td class="meta-head"><h5>Chalan Number : </h5></td>
                    <?php 
                    	$this->db->where("salebill_no",$this->uri->segment(3));
                    	$trj = $this->db->get("sale_bill_tex")->row();;

                    
                    ?>
                    <td><?php echo $trj->chalan_num; ?></td>
                </tr>
            </table>
            </div>
           <br>
            <br>
             <br>
					<div  style="margin-left:180px;"></br></br></br>
						<h2 style="border: 0px solid #000; padding: 4px; width: 200px; margin-left:150px;">
							TAX INVOICE
						</h2>
			</div>
		 <?php $this->db->where("salebill_no",$this->uri->segment(3));
		  		$printvat = $this->db->get("sale_bill_tex")->row();
		  		
		  		$outputvat=$printvat->vat_per;
		  		if($outputvat<9){
					$outputvat=9;
			}
		  		$outputsat = $printvat->vat_rs;
		  		if($outputsat<9){
$outputsat=9;
}
		  		?>
		</div>
			<table id="items" style="border: 1px solid #000;">
		 <tr style="border: 1px solid #000;">
		       <th width="4%" style="border: 1px solid #000;">No.</th>
             
               <th width="30%" style="border: 1px solid #000;">Description</th>
               <th width="7%" style="border: 1px solid #000;">Quantity</th>
                <th width="7%" style="border: 1px solid #000;">HSN/SAC</th>
               <th width="9%" style="border: 1px solid #000;">Unit Price</th>
                <th width="5%" style="border: 1px solid #000;">SGST</th>
                 <th width="5%" style="border: 1px solid #000;">CGST</th>
                  <th width="5%" style="border: 1px solid #000;">IGST</th>
               <th width="7%" style="border: 1px solid #000;">Discount</th>
               <th width="10%" style="border: 1px solid #000;">Total Price</th>
               <th width="15%" style="border: 1px solid #000;">Sub Total</th>
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
		      <td style="border: 1px solid #000;"><?php echo $i; ?></td>
		     
		    <td style="border: 1px solid #000;">
		      	<?php 
		      		echo $row->company_name."<br><h6>".$row->item_name."<h6><br>".$row->serial_number;
		      		
		      		
		      	?>
		      </td>
		      <td style="border: 1px solid #000;"><?php echo $row->product_quantity; ?>
		      
		      	</td>
		      	 <td setyle="border: 1px solid #000;">
		      	  <?php 
		   //	$this->db->distinct();
		   	$this->db->select("hsn_sac");
          //  $this->db->where("company_name",$p->name);
           
		   //  $this->db->where("bill_number",$this->uri->segment(3));
		   	$this->db->where("company_name",$row->company_name);
		     $rty =  $this->db->where("bill_no",$this->uri->segment(3))->get("product_sale");
		      if($rty->num_rows()>0){ $cj=1;
		      	foreach($rty->result() as $t):
		      	echo "<br>&nbsp;&nbsp;".$t->hsn_sac;
		      	$cj++;
		      	endforeach;}
		      	else{
					echo $t->hsn_sac;

			}
               ?></td>
		      <td style="border: 1px solid #000;"><?php echo $row->prise_per_pro; ?></td>
		         <td style="border: 1px solid #000;"><?php echo $row->sat; ?></td>
		            <td style="border: 1px solid #000;"><?php echo $row->vat; ?></td>
		            <td style="border: 1px solid #000;"><?php echo "0.00"; ?></td>
		      <td style="border: 1px solid #000;"><?php echo $row->discount_rate; ?></td>
              <td style="border: 1px solid #000;"><?php echo $row->total; ?></td>
		      <td style="border: 1px solid #000;"><?php echo $row->sub_total; ?></td>
		  </tr>
	  	  <?php $i++; endforeach;?>
	  	
		 
		  <tr>
		  <td class="total-line" colspan="5"><strong>Output CGST </strong></td>
		 
		      <td class="total-value"><div id="total"><?php echo $outputvat."%"; ?></div></td>
		       <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td style="border: 1px solid #000;"><div id="total"></div><?php $vat = ($outputvat*$printvat->total)/100; echo $vat;?></td>
		      </tr>
		      <tr>
		       <td class="total-line" colspan="5"><strong>Output SGST </strong></td>
		      <td class="total-value"><div id="total"><?php echo $outputsat."%"; ?></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td style="border: 1px solid #000;"><div id="total"></div><?php $vas = ($outputsat*$printvat->total)/100; echo $vas;?></td>
		      </tr>
		      
		        <tr>
              <td class="total-line" colspan="5"><strong>Total Discount</strong></td>
               <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		      <td class="total-value"><div id="total"></div></td>
		       <td class="total-value"><div id="total"></div></td>
		      <td style="border: 1px solid #000;"><div id="total"><?php echo $printvat->discount; ?></div></td>
		  
		  </tr>
		   
		   <tr>
		      <td colspan="10" align="center" style="border: 1px solid #000;"><strong>Total</strong></td>
		       
		      <td style="border: 1px solid #000;" ><?php echo $total_info->total; ?></td>
		  </tr>
          
		  <!--  <tr>
		      <td colspan="10" align="center" style="border: 1px solid #000;"><strong>Amount Paid</strong></td>
		      
		      <td style="border: 1px solid #000;"><div id="total"><?php echo $total_info->paid; ?></div></td>
             
		  </tr>-->
		
		</table>
		</br>
		<div> Paid Amount in words : <div class="number"></div></strong><script> document.write(convert_number(<?php echo $total_info->paid; ?>)); </script> Rupee Only/-</strong>
	           </div>
		<table width="100%" align ="center">
		</br>
				<tr>
						<td width="50%" >Pre Autheticated By</br>
						</br>
						</br>
						</br>
						Pre Autheticated By</br>
						Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</br>
						Designation:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</br>
						</td>
						<td width="50%" >For ZAP COMPUTERS SALES & SERVICE</br>
						</br>
						</br>
						</br>
						Issuing Signatory </br>
						Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</br>
						Designation:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</br>
						
						</td>
				</tr>
		</table>
		<div >
		</br>
		</br>
		<div >
		</br>
		</br>
		<h3>BANK NAME:</h3>UNION BANK OF INDIA 
		<h3>ACCOUNT NUMBER:</h3>302601010780085 
		<h3>IFSC CODE:</h3>UBINO530263
		<h3>ADDRESS / PIN NO.:</h3>SARVODAYA NAGAR, 208005
		
		</div>
		<div style="margin-left: 500px  ; margin-top:-170px">
		</br>
		</br>
		<h3>BANK NAME:</h3>INDIAN OVERSEAS BANK
		<h3>ACCOUNT NUMBER:</h3>178633000000020 
		<h3>IFSC CODE:</h3>IOBA0001786
		<h3>ADDRESS / PIN NO.:</h3>BURRA KANPUR, 208027
		
		</div>
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