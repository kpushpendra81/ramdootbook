<div id="main-wrapper" class="container" style="width:100%; font-size:12px;">
	<form action="<?php echo base_url();?>product/returnProduct"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
	<div class="row">
		<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
			<div class="panel panel-white">
				<div class="panel-body"  >
					<div class="row space20">
						<div class="col-sm-8">
							<label class="col-sm-6 control-label">
								<strong>Bill Number</strong><span class="symbol required"></span>
							</label>
							<div class="col-sm-6">
								<input class="form-control" placeholder="Please Enter Bill Number" type="text" id="billNo" name="billNo"/>
							</div>
						</div>
					</div>
					<div class="row space20">
						<div class="col-sm-12" id="reply"></div>
					</div>
					<div class="row" id="rahul23">
						<div class="col-md-12">
						<div class="panel-heading panel-grey">
								Product Information:
						</div>
						<table class="table table-hover">
							<thead>
		                        <tr>
		                           <th>#</th>
		                           <th><label>Item Name</label></th>
		                           <th><label>Item Quantity</label></th>
		                           <th><label>Price/Piece</label></th>
		                           <th><label>Discount (%)</label></th>
		                           <th><label>Discount Rs</label></th>
		                           <th><label>Total Price</label></th>
		                           <th><label>Sub Total</label></th>
		                           <th><label>Add</label></th>
		                           <th><label>Remove</label></th>
		                        </tr>
		                    </thead>
		                    <tbody>
	                        <?php $i = 1; for($i = 1; $i <= 30; $i++){ ?>
	                        <tr id="row<?php echo $i; ?>">
	                            <td width="40">
	                                <strong><?php echo $i; ?></strong>
	                             </td>
	                            <td>
	                                  <input id="item_name<?php echo $i; ?>" name="item_name<?php echo $i; ?>" style="width:170px;">
	                                  <input type="hidden" id="item_no<?php echo $i; ?>" name="item_no<?php echo $i; ?>"o>
	                            </td>
	                            <td>
	                                <input id="item_quantity<?php echo $i; ?>" name="item_quantity<?php echo $i; ?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                   <input id="item_price<?php echo $i; ?>" name="item_price<?php echo $i; ?>" style="width:50px;">
	                            </td>
	                            <td>
	                                <input id="item_discount<?php echo $i; ?>" name="item_discount<?php echo $i; ?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="discount<?php echo $i; ?>" name="discount<?php echo $i; ?>" style="width:50px;" type="text"/>
	                            </td>
	                            <td>
	                                  <input id="total_price<?php echo $i; ?>" name="total_price<?php echo $i; ?>" style="width:70px;" type="text"/>
	                            </td>
	                            <td>
	                                <input id="sub_total<?php echo $i; ?>" name="sub_total<?php echo $i; ?>" style="width:70px;" type="text"/>
	                            </td>
	                            <td>
	                            	<?php if($i != 1 && $i != 2 && $i != 3){?>
	                                <span class="btn btn-success" id="add<?php echo $i;?>">Add</span>
	                                <?php }?>
	                            </td>
	                            <td>
	                            	<?php if($i != 1 && $i != 2 && $i != 3 && $i != 4){?>
	                                <span class="btn btn-danger" id="del<?php echo $i;?>">Del</span>
	                                <?php } ?>
	                            </td>
	                       </tr>
	                       <?php } ?>
	                       <tr>
	                            	<td colspan="3"><strong>Previous Balance</strong></td>
	                                <td colspan="5"><input id="p_balance" name="p_balance" style="width:180px;" type="text"/></td>
	                                <td colspan="5">
	                                	<strong>Remark if any...</strong>
	                                </td>
	                       </tr>
	                       <tr>
	                            	<td colspan="3"><strong>Total</strong></td>
	                                <td colspan="5"><input id="total" name="total" style="width:180px;" type="text" required /></td>
	                                <td rowspan="3" colspan="5">
	                                	<textarea rows="5" cols="20" name="remark" class="form-control"></textarea>
	                                </td>
	                       </tr>
	                       <tr>
	                            	<td colspan="3"><strong>Return Amount</strong></td>
	                                <td colspan="5"><input id="paid" name="paid" style="width:180px;" type="text" required /></td>
	                       </tr>
	                       <tr>
	                            	<td colspan="3"><strong>Balance</strong></td>
	                                <td colspan="5"><input id="balance" name="balance" style="width:180px;" type="text" /></td>
	                       </tr>
	                      </tbody>
	                  </table>
	                  </div>
	                  <div class="col-md-4">
	                  <b id="dt"></b>
	                    			<input type="submit" name="day_book_detail" value="Save & Print Reciept" class="btn btn-success">
	                    	</div>
	              </div>
										
					</div>
					
				</div>
			</div>
		</div>
	</form>
</div>