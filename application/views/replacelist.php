					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                        	<tr>
                                            	<th>#</th>
                                                <th>Customer ID</th>
                                                <th>Service fee</th>
                                                <th>Mobile</th>
                                                <th>Product Name</th>
                                                <th>Purchase Date</th>
                                                <th>Bill number</th>
                                                <th>Product Amount</th>
                                                 <th>Status</th>
                                                <th>Replace Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        	$i = 1; foreach($li as $row):
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?><input type="hidden" id="sr<?php echo $i;?>" name="sr<?php echo $i;?>" value="<?php echo $row->sr;?>" /></td>
                                                <td><input type="hidden" id="customer<?php echo $i;?>" name="customer<?php echo $i;?>" value="<?php echo $row->customer_id;?>" /><?php echo $row->customer_id;?></td>
                                                <td><?php echo $row->service_fee;?></td>
                                                <td><input type="hidden" id="model<?php echo $i;?>" name="model<?php echo $i;?>" value="<?php echo $row->model_number;;?>" /><?php echo $row->model_number;?></td>
                                                <td><input type="hidden" id="replace_p_name<?php echo $i;?>" name="replace_p_name<?php echo $i;?>" value="<?php echo $row->replace_p_name;?>" /><?php echo $row->replace_p_name;?></td>
                                                <td><?php echo $row->purchase_date;?></td>
                                                <td><input type="hidden" id="bill_num<?php echo $i;?>" name="bill_num<?php echo $i;?>" value="<?php echo $row->bill_num;?>" /><?php echo $row->bill_num;?></td>
                                                <td><?php echo $row->product_amount;?></td>
                                               
                                                <td>
                                                <button id = "pro<?php echo $i;?>" class="btn btn-success">
				 												<?php echo $row->status;?> <i class="fa fa-arrow-circle-right"></i>
				 											</button>
                                              </td>
                                                <td>
                                                <input type ="button" value = "<?php echo $row->replacedate;?>" class="btn btn-success btn-sm" id="msg1<?php echo $i;?>">
                                                
                                               </td>
                                            </tr>
                                        <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					
					<script> 
	<?php for($j=1;$j<=$i;$j++){?>
		$("#pro<?php echo $j;?>").click(function(){
			
			var sr = $("#sr<?php echo $j;?>").val();
			var customer = $("#customer<?php echo $j;?>").val();
			var model = $("#model<?php echo $j;?>").val();
			var replace_p_name = $("#replace_p_name<?php echo $j;?>").val();
			var bill_num = $("#bill_num<?php echo $j;?>").val();
			
				$.post("<?php echo site_url("index.php/replace/updateReplace") ?>",{sr : sr, customer : customer, model : model, replace_p_name : replace_p_name, bill_num : bill_num}, function(data){

					$("#msg1<?php echo $j;?>").val(data);
				});
			
		});
		<?php }
		?>
	</script>