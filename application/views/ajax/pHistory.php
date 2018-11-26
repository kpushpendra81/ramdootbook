<?php if($is):?>
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Customer ID  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<?php echo $info->patient_id; ?>
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Customer Name  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<?php echo $info->p_name; ?>
									</div>	
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Gender  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<?php echo $info->gender; ?>
									</div>
								</div>
								
							</div>
								
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
									Address  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<?php echo $info->address; ?>
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Mobile Number 
									</label>
									<div class="col-sm-7">
										<?php echo $info->mobile; ?>
									</div>
								</div>
							</div>
							
								
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
									Given Product  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<?php echo $info->weight; ?>
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Time Taken
									</label>
									<div class="col-sm-7">
										<?php echo $info->bp_level; ?>
									</div>
								</div>
							</div>
							<br/><hr/><br/>
							<table class="table">
								<thead>
									<tr>
										<th>Services Date</th>
										<th>Branch Id</th>
										<th>Time Taken</th>
										<th>Given Product</th>
										<th>Service Name</th>
										<th>Detail</th>
										<th>Fee</th>
									</tr>	
								</thead>
								<tbody>
									<?php foreach ($row1->result() as $row):?>
									<tr>
										<td><?php echo $row->t_date; ?></td>
										<td><?php echo $row->clinic_id; ?></td>
										<td><?php echo $row->bp; ?></td>
										<td><?php echo $row->weight; ?></td>
										<td><?php echo $row->disease; ?></td>
										<td><?php echo $row->detail; ?></td>
										<td><?php echo $row->doc_fee; ?></td>
									</tr>
									<?php endforeach;?>	
								</tbody>
							</table>
<?php else:?>
	<div class="alert alert-danger">
		No Record Found....
	</div>
<?php endif;?>