			<?php $balance = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row()->closing_balance; ?>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>dayBook/rSaleList.jsp" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="sdt" class="form-control date-picker" placeholder="Start Date" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">End Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="edt" class="form-control date-picker" placeholder="End Date" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Select Refrance</label>
                                            <div class="col-sm-4">
                                                <select name="refId" class="form-control" required="required">
													<option value="">-Select Refrance-</option>
													<?php 
														$ref = $this->db->get("ref")->result();
														foreach($ref as $row):
													?>
														<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
													<?php endforeach;?>
													<option value="all">All</option>
												</select>
                                            </div>
                                            <div class="col-sm-offset-2 col-sm-2">
                                                <button type="submit" id="btn1" class="btn btn-success">Get Detail</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                    <?php if($isPost):?>
                    	<?php if($list->num_rows() > 0):?>
		                     <div class="row">
		                        <div class="col-md-12">
		                            <div class="panel panel-white">
		                                <div class="panel-body">
		                                    <table class="table">
		                                    	<thead>
		                                    		<tr>
		                                    			<th>#</th>
		                                    			
		                                    			<th>Name</th>
		                                    			<th>Total Unit</th>
		                                    			<th>P Price</th>
		                                    			<th>Sale Price</th>
		                                    			<th>Diffrance</th>
		                                    			<th>Comission</th>
		                                    		</tr>
		                                    	</thead>
		                                    	<tbody>
		                                    		<?php 
		                                    			$sno = 1; 
		                                    			foreach($list->result() as $row):
		                                    			$this->db->where("name",$row->company_name);
		                                    			$item = $this->db->get("enter_stock1")->row();
		                                    			$pRate = $row->quant * $item->pRate;
		                                    			$sRate = $row->quant * $item->prize_perunit;
		                                    			$diff = $sRate - $pRate;
		                                    		?>
		                                    		<tr>
		                                    			<td><?php echo $sno;?></td>
		                                    			
		                                    			<td><?php echo $item->name;?>
		                                    			<td><?php echo $row->quant;?></td>
		                                    			<td><?php echo $row->quant ." * ". $item->pRate." = <b>".$pRate."</b>";?></td>
		                                    			<td><?php echo $row->quant ." * ". $item->prize_perunit." = <b>".$sRate."</b>";?></td>
		                                    			<td><?php echo "<b>".$diff."</b>";?></td>
		                                    			<td><?php echo ($diff*$val)/100;?></td>
		                                    		</tr>
		                                    		<?php $sno++; endforeach;?>
		                                    	</tbody>
		                                    </table>
		                                </div>
		                            </div>
		                        </div>
		                    </div><!-- Row -->
		                <?php else:?>
		                	<div class="alert alert-danger">
		                		No Record Found....
		                	</div>
                    	<?php endif;?>
                    <?php endif;?>
                    
                </div><!-- Main Wrapper -->
