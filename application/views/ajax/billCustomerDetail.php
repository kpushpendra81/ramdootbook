<?php if($isReguler):?>
	<?php if($cDetail->num_rows() > 0):?>
		<?php $row = $cDetail->row();?>
		<br/>
		<div class="row">
			<div class="col-md-2 panel-yellow">
				<label>Customer ID</label>
			</div>
			<div class="col-md-2">
				<input type="hidden" name="c_id" value="<?php echo $row->patient_id;?>">
				<label><?php echo $row->patient_id;?></label>
			</div>
			
			<div class="col-md-2 panel-yellow">
				<label>Customer Name</label>
			</div>
			<div class="col-md-2">
				<label><?php echo $row->p_name;?></label>
			</div>
			
			<div class="col-md-1 panel-yellow">
				<label>Address</label>
			</div>
			<div class="col-md-3">
				<label><?php echo $row->address;?></label>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2 panel-yellow">
				<label>Mobile Number</label>
			</div>
			<div class="col-md-2">
				<label><?php echo $row->mobile;?></label>
			</div>
			
			
			
			<div class="col-md-1 panel-yellow">
				<label>Gender</label>
			</div>
			<div class="col-md-3">
				<label><?php echo $row->gender;?></label>
			</div>
			<div class="col-md-1 panel-yellow">
				<label>Tin Number</label>
			</div>
			<div class="col-md-3">
				<label><?php echo $row->bp_level;?></label>
			</div>
		</div>
		
		
		<hr/>
		<div class="row">
			<div class="col-md-2 panel-yellow">
				<label>GST Number</label>
			</div>
			<div class="col-md-2">
				<label><?php echo $row->Gst;?></label>
			</div>
			
			
			
		</div>
		
		<?php if($isReturn):?>
			<hr/>
			<div class="row">			
				<div class="col-md-2 panel-yellow">
					<label>Purchase Date</label>
				</div>
				<div class="col-md-2">
					<label><?php echo date("d-M-Y",strtotime($billDetail->date)); ?></label>
				</div>
				
				<div class="col-md-1 panel-yellow">
					<label>Total Bill</label>
				</div>
				<div class="col-md-3">
					<label><?php echo $billDetail->total;?></label>
				</div>
				
				<div class="col-md-2 panel-yellow">
					<label>Balance</label>
				</div>
				<div class="col-md-2">
					<label><?php echo $billDetail->balance;?></label>
				</div>
			</div>
			<hr/>
			<div class="row">			
				<div class="col-md-2 panel-yellow">
					<label>Paid</label>
				</div>
				<div class="col-md-2">
					<label><?php echo $billDetail->paid; ?></label>
				</div>
			</div>
		<?php endif;?>
		
	<?php else:?>
		<div class="row">
			<div class="col-md-2">
				<label style="color: red;">Patient ID dose not matched....</label>
			</div>
		</div>
	<?php endif;?>
	
<?php else:?>
	<div class="row">
		<div class="col-md-2 panel-yellow">
			<label>Customer Name</label>
		</div>
		<div class="col-md-2">
			<label><?php echo $billDetail->customar_id;?></label>
		</div>
		
		<div class="col-md-2 panel-yellow">
			<label>Purchase Date</label>
		</div>
		<div class="col-md-2">
			<label><?php echo date("d-M-Y",strtotime($billDetail->date)); ?></label>
		</div>
		
		<div class="col-md-1 panel-yellow">
			<label>Total Bill</label>
		</div>
		<div class="col-md-3">
			<label><?php echo $billDetail->total;?></label>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-2 panel-yellow">
			<label>Balance</label>
		</div>
		<div class="col-md-2">
			<label><?php echo $billDetail->balance;?></label>
		</div>
		
		<div class="col-md-2 panel-yellow">
			<label>Paid</label>
		</div>
		<div class="col-md-2">
			<label><?php echo $billDetail->paid; ?></label>
		</div>
	</div>
<?php endif;?>