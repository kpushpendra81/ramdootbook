<?php if($isRow): ?>
	<div class="alert alert-info">
		Previous PROCEDURE detail
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>Patient Id</th>
				<th>Procedure Name</th>
				<th>Procedure Fee</th>
				<th>Previous Due</th>
				<th>Current Due</th>
				<th>Paid</th>
				<th>Last T.Date</th>
				<th>Print</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($val as $row):?>
			<tr>
				<td><?php echo $row->patient_id; ?></td>
				<td><?php echo $row->procedure_name; ?></td>
				<td><?php echo $row->procedure_fee; ?></td>
				<td><?php echo $row->previous_due; ?></td>
				<td><?php echo $row->current_due; ?></td>
				<td><?php echo $row->paid; ?></td>
				<td><?php echo date("d-M-Y H:i:s",strtotime($row->date)); ?></td>
				<td><a href="<?php echo (base_url()."patient/printReport/".$row->patient_id."/print.jsp");?>"><?php echo $row->patient_id; ?></a></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php else: ?>
	<div class="alert alert-danger">
		Threre is no PROCEDURE record for this patient....
	</div>
<?php endif;?>