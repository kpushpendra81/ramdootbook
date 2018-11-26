					<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                  
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                        	<tr>
                                            	<th>#</th>
											
												<th>Name</th>
												<th>Company Name</th>
												
											
												<th>Price/Unit</th>
												
												<th>  
													<table border="1" width="100%" >
													<tr > 
															<th colspan="3">Item Quantity </th>
															
														</tr>
														<tr> 
															<th> Instock</th>
															<th>OutStock</th>
															<th>Total</th>
														</tr>
													</table>
												</th>
												<th>Bill Number</th>
												<th>Update Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        	$i = 1; foreach($proDetail as $row):
                                        ?>
                                            <tr <?php //if($row->item_quantity < 16){ echo 'class="alert alert-danger"'; } ?>>
                                                <td><?php echo $i;?></td>
											
												<td><a href="<?php echo base_url();?>index.php/home/<?php echo $row->sno;?>"><?php echo $row->name;?></a></td>
												<td><?php echo $row->company_name;?></td>
											
												<td><?php echo $row->prize_perunit;?></td>
												
												<td>
												<table border="1">
														<tr> 
															<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
														</tr>
													</table>
												
												<?php //echo $row->item_quantity;?>
												</td>
												<td><?php echo $row->reff_bill_num;?></td>
												<td><?php echo date("d-M-Y",strtotime($row->a_date));?></td>
                                       		</tr>
                                        <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
						</div>
					</div>