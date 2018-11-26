<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Candidate Profile</title>
	<?php if($this->uri->segment(4) == "lskajdfasiuf09e4iuorivmnsldfosuteioruetoi"):?>
		<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<?php elseif($this->uri->segment(4) == "lkfjsaodif0w9809sodiuf4rifsd9f80w934oiwoifu"):?>
		<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style1.css' />
	<?php endif;?>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

	<style type="text/css">
		table tr th{
			text-align: left;
		}		
	</style>
	<style type="text/css" media="print">
	    @page 
	    {
	        size: auto;   /* auto is the initial value */
	        margin-bottom: 0mm;  /* this affects the margin in the printer settings */
	    }
	</style>
	
</head>

<body>

	<div id="page-wrap" style="border: 1px solid #FFF; width:1000px;">
		<?php 
	$institute_info = mysql_query("select * from general_settings");
	$info = mysql_fetch_object($institute_info);
?>		
		<table style="width: 100%">
			<tr>
				<td style="border: none;">
					<h1 align="center" style="text-transform:uppercase;"><?php echo $info->institute_name; ?></h1>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->address_1." ".$info->address_2." ".$info->city; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php echo $info->state." - ".$info->pin; ?>
			        </h3>
			        <h3 align="center" style="font-variant:small-caps;">
						<?php if(strlen($info->phone_number > 0 )){echo "Phone : ".$info->phone_number.", ";} ?>
			            <?php echo "Mobile : ".$info->mobile_number; ?>
			        </h3>
				</td>
			</tr>
		</table>
		
        
		<div style="clear:both"></div>
	<?php $studentId = $this->uri->segment(3); ?>	
<?php
	$this->db->where("student_id",$studentId);
	$detail = $this->db->get("student_info")->row();	
?>
		
		<table id="items">
			<tr>
				<th>Student ID (Login ID)</th>
				<td><?php echo $detail->student_id; ?></td>
				<th>Candidate Name</th>
				<td><?php echo $detail->name; ?></td>
			</tr>
			<tr>
				<th>Father's Name</th>
				<td><?php echo $detail->fName;?></td>
				<th>Address</th>
				<td><?php echo $detail->address;?></td>
			</tr>
			<tr>
				<th>City</th>
				<td><?php echo $detail->city;?></td>
				<th>State</th>
				<td><?php echo $detail->state;?></td>
			</tr>
			<tr>
				<th>Pin Code</th>
				<td><?php echo $detail->pin;?></td>
				<th>Mobile Number</th>
				<td><?php echo $detail->mobile;?></td>
			</tr>
			<tr>
				<th>Date of birth</th>
				<td><?php echo date("d-M-Y",strtotime($detail->dob));?></td>
				<th>Heighes Qualification</th>
				<td><?php echo $detail->heighQ;?></td>
			</tr>
			<tr>
				<th>Course Applied</th>
				<td><?php echo $detail->courseApplied;?></td>
				<th>Batch Time</th>
				<td><?php echo $detail->timing;?></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td><?php echo $detail->gender;?></td>
				<th>Email Address</th>
				<td><?php echo $detail->email;?></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><?php echo $detail->password;?></td>
				<th>Joine Date</th>
				<td><?php echo date("d-M-Y",strtotime($detail->joinDate));?></td>
			</tr>
			<tr>
				<th>Joining Time</th>
				<td><?php echo $detail->joinTime;?></td>
				<th>Are you approved by institute ?</th>
				<td><?php echo $detail->isApprove;?></td>
			</tr>
			<tr style="border: none;">
				<td style="border: none;">
					<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
						<?php if(strlen($detail->photo > 0)):?>
							<img alt="<?php echo $detail->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $detail->photo;?>" />
						<?php else:?>
							<?php if($detail->gender == 'Male'):?>
								<img alt="<?php echo $detail->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuMale.png" />	
							<?php endif;?>
							<?php if($detail->gender == 'Female'):?>
								<img alt="<?php echo $detail->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuFemale.png" />	
							<?php endif;?>
						<?php endif;?>
					</div>
				</td>
				<td style="border: none;">
					<div style="width: 140px; height: 150px;">
						<?php if(strlen($detail->signature > 0)):?>
							<img alt="<?php echo $detail->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $detail->signature;?>" />
						<?php else:?>
							<img alt="<?php echo $detail->name;?>" width="190" src="<?php echo base_url()?>assets/images/stuImage/signature.png" />	
						<?php endif;?>
					</div>
				</td>
				<td colspan="2" width="50%" valign="top">
					<?php if($this->uri->segment(4) == "lskajdfasiuf09e4iuorivmnsldfosuteioruetoi"):?>
						Your admission is not confirmed in CMG. You have to submit this printout to institute and take approval 
						of admission than you will be eligible for online test paper of CMG. And other facilities of Career Maker Group (CMG).
					<?php elseif($this->uri->segment(4) == "lkfjsaodif0w9809sodiuf4rifsd9f80w934oiwoifu"):?>
						<h4 style="color: #019a61;">Your Registration is confirmed with CMG.</h4>
					<?php endif;?>
					
					<br/>
					<br/><br/>
					<strong>Regards</strong>
					<br/>
					Career Maker Group (CMG)
				</td>
			</tr>
		</table>
		
		
		<center>
	    	<button class="btn" type="button" onclick="window.print();" >
	        	 Print
	        </button>
	    </center>
    </div>
	
</body>

</html>