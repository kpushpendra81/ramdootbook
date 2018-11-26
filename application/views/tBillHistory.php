					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                        	<tr>
                                            	<th>#</th>
                                                <th>salebill_no</th>
                                                <th>Chalan Number</th>
                                                <th>customar_id</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Date</th>
                                                <th>Previous Balance</th>
                                                  <th>Discount</th>
                                                <th>Paid</th>
                                                <th>Total</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        	$i = 1; 
                                        $this->db->where("clinic_id",$this->session->userdata("clinic_id"));
											$val= $this->db->get("sale_bill_tex");
											if($val->num_rows() > 0)
											{
                                        	foreach($val->result() as $row):
                                        		//$row1 = $this->customermodel->getById($row->customar_id);
                                        		$this->db->where("patient_id",$row->customar_id);
                                        		$abc = $this->db->get("patient");
                                        		$row1 = $abc->row();
                                        		$num = $abc->num_rows();
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><a href="<?php echo base_url();?>invoiceController/texin/<?php echo $row->salebill_no;?>"><?php echo $row->salebill_no;?></a></td>
                                                <td><?php echo $row->chalan_num;?></td>
                                                <td><?php echo $row->customar_id;?></td>
                                                <td>
                                                	<?php 
                                                		if($num > 0){
                                                			echo $row1->p_name;
                                                		}else{
                                                			echo $row->customar_id;
                                                		}
                                                	?>
                                                </td>
                                                <td>
                                                	<?php 
                                                		if($num > 0){
                                                			echo $row1->mobile;
                                                		}else{
                                                			echo "N/A";
                                                		}
                                                	?>
                                                </td>
                                                <td><?php echo date("d-M-Y",strtotime($row->date));?></td>
                                                <td><?php echo $row->pri_balance;?></td>
                                                  <td><?php echo $row->discount;?></td>
                                                <td><?php echo $row->paid;?></td>
                                                <td><?php echo $row->total?></td>
                                                <td><?php echo $row->balance;?></td>
                                            </tr>
                                        <?php $i++; endforeach;
                                        	}else{ echo "NO BILL  found";}?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>