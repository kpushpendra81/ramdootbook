<div id="main-wrapper" class="container" style="width:100%; font-size:12px;">
	<form action="<?php echo base_url();?>product/saleProduct1" method ="post">
	<div class="row">
		<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
			<div class="panel panel-white">
				<div class="panel-body"  >
					<div class="row space20">
						<div class="col-sm-4">
							<label class="col-sm-6 control-label">
								Select Customer<span class="symbol required"></span>
							</label>
							<div class="col-sm-6">
								<select class="form-control" id="types" name="types" style="width: 170px;" required="required">  
									 <option value="" selected="selected">--Select Customer--</option>
									 <option value="Regular">Regular</option>  
									 <option value="Retail">Cash Customer</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<input class="form-control" placeholder="Customer Name" type="text" id="retail" name="retail" style="display: none;"/>
							<input class="form-control" placeholder="Customer ID" type="text" id="regular" name="regular" style="display: none;"/>
						</div>
						<div class="col-sm-4">
							<div class="col-sm-8">
								<select class="form-control" id="ref" name="ref" required="required">  
									 <option value="" selected="selected">--Select Refrance--</option>
									  <option value="None">None</option>
									 <?php foreach($ref as $dis):?>
									 <option value="<?php echo $dis->id;?>"><?php echo $dis->name;?></option>
									 <?php endforeach;?>
								</select>
							</div>
							<div class="col-sm-4">
								<input class="form-control" name="dis" id="dis" placeholder="Discount (%)" type="text"/>
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
						<table class='table-hover' border='1' width='100%' >
							<thead>
		                        <tr>
		                           <th>#</th>
		                           <th width="250"><label>Name</label></th>
		                          
		                           <th><label>Price/Piece</label></th>
		                            <th><label>Hsn/Sac</label></th>
		                           <th><label>Avl.Q.</label></th>
		                           <th><label>Quantity</label></th>
		                            <th><label>CGST</label></th>
		                             <th><label>SGST</label></th>
		                           <th><label>Discount (%)</label></th>
		                           <th><label>Discount Rs</label></th>
		                           <th><label>Total</label></th>
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
	                                  <input id="item_name<?php echo $i; ?>" class='form-control' name="item_name<?php echo $i; ?>"  width='100%'>
	                                  <div id ="printS<?php echo $i;?>"></div>
	                            </td>
	                            <td>
	                                   <input id="item_price<?php echo $i; ?>" class='form-control'  name="item_price<?php echo $i; ?>" width='100%'>
	                                    <input type="hidden" id="company_name<?php echo $i; ?>" class='form-control'  name="company_name<?php echo $i; ?>" width='100%'>
	                                     <input type="hidden" id="product_code<?php echo $i; ?>" class='form-control'  name="product_code<?php echo $i; ?>" width='100%'>
	                            </td>
	                            <td>
	                                   <input type='text' class='form-control' id='hsn_sac<?php echo $i; ?>' name="hsn_sac<?php echo $i; ?>" width='100%'>
	                            </td>
	                            <td>
	                                <input id="avlQ<?php echo $i; ?>" name="avlQ<?php echo $i; ?>" class='form-control' width='100%' type="text"/>
	                            </td>
	                            <td>
	                                <input id="item_quantity<?php echo $i; ?>" name="item_quantity<?php echo $i; ?>" class='form-control' width='100%' type="text"/>
	                            </td>
	                             <td>
	                                <input id="vat<?php echo $i; ?>" name="vat<?php echo $i; ?>"  width='100%' class='form-control' type="text"/>
	                            </td>
	                             <td>
	                                <input id="sat<?php echo $i; ?>" name="sat<?php echo $i; ?>"  width='100%' class='form-control' type="text"/>
	                            </td>
	                            <td>
	                                <input id="item_discount<?php echo $i; ?>" name="item_discount<?php echo $i; ?>"  class='form-control' width='100%' type="text"/>
	                            </td>
	                            <td>
	                                <input id="discount<?php echo $i; ?>" name="discount<?php echo $i; ?>" class='form-control' width='100%' type="text"/>
	                            </td>
	                            <td>
	                                  <input id="total_price<?php echo $i; ?>" name="total_price<?php echo $i; ?>" class='form-control' width='100%' type="text"/>
	                            </td>
	                            <td>
	                                <input id="sub_total<?php echo $i; ?>" name="sub_total<?php echo $i; ?>" class='form-control' width='100%' type="text"/>
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
	                       <script>
	                       $("#item_quantity<?php echo $i;?>").keyup(function(){
											var st = $("#item_quantity<?php echo $i;?>").val();
											var count=<?php echo $i;?>;
											
											$.post("<?php echo site_url("home/printSerial") ?>",{st : st,count : count}, function(data){
											$("#printS<?php echo $i;?>").html(data);
											});
											var pr = Number($('#item_price<?php echo $i; ?>').val());
											var vatper = Number($('#vat<?php echo $i;?>').val());
											var satper = Number($('#sat<?php echo $i;?>').val());
											var dis = $('#discount<?php echo $i;?>').val();
											var totalamount= st*pr;
											var sat = (totalamount*satper)/100;
											var vat = (totalamount*vatper)/100;
											var bal = totalamount + sat + vat- dis;
											$("#total_price<?php echo $i;?>").val(bal);
											$("#sub_total<?php echo $i;?>").val(bal);
											var totaly=0;
											<?php for($g=1;$g<$i+1;$g++){?>
											
											totaly = totaly + Number($('#sub_total<?php echo $g;?>').val());
											<?php }?>
											$("#total").val(totaly);
											});


	                       $('#vat<?php echo $i;?>').keyup(function(){
								var vatper = Number($('#vat<?php echo $i;?>').val());
                                  
								var satper = Number($('#sat<?php echo $i;?>').val());
								var st = $("#item_quantity<?php echo $i;?>").val();
								var pr = $('#item_price<?php echo $i; ?>').val();
								var dis = $('#discount<?php echo $i;?>').val();
								var totalamount= st*pr;
								var sat = (totalamount*satper)/100;
								var vat = (totalamount*vatper)/100;
								var bal = totalamount + sat + vat- dis;
								$("#total_price<?php echo $i;?>").val(bal);
								$("#sub_total<?php echo $i;?>").val(bal);
								var totaly=0;
								<?php for($g=1;$g<$i+1;$g++){?>
								
								totaly = totaly + Number($('#sub_total<?php echo $g;?>').val());
								<?php }?>
								$("#total").val(totaly);
								});
							$('#sat<?php echo $i;?>').keyup(function(){
								var vatper = Number($('#vat<?php echo $i;?>').val());
								var satper = Number($('#sat<?php echo $i;?>').val());
								var st = $("#item_quantity<?php echo $i;?>").val();
								var pr = $('#item_price<?php echo $i; ?>').val();
								var dis = $('#discount<?php echo $i;?>').val();
								var totalamount= st*pr;
								var sat = (totalamount*satper)/100;
								var vat = (totalamount*vatper)/100;
								var bal = totalamount + sat + vat- dis;
								$("#total_price<?php echo $i;?>").val(bal);
								$("#sub_total<?php echo $i;?>").val(bal);
								var totaly=0;
								<?php for($g=1;$g<$i+1;$g++){?>
								
								totaly = totaly + Number($('#sub_total<?php echo $g;?>').val());
								<?php }?>
								$("#total").val(totaly);
								});
							$('#discount<?php echo $i;?>').keyup(function(){
								var vatper = Number($('#vat<?php echo $i;?>').val());
								var satper = Number($('#sat<?php echo $i;?>').val());
								var st = $("#item_quantity<?php echo $i;?>").val();
								var pr = $('#item_price<?php echo $i; ?>').val();
								var dis = $('#discount<?php echo $i;?>').val();
								var totalamount= st*pr;
								var sat = (totalamount*satper)/100;
								var vat = (totalamount*vatper)/100;
								var bal = totalamount + sat + vat- dis;
								$("#sub_total<?php echo $i;?>").val(bal);
								var totaly=0;
								<?php for($g=1;$g<$i+1;$g++){?>
								
								totaly = totaly + Number($('#sub_total<?php echo $g;?>').val());
								<?php }?>
								$("#total").val(totaly);
								});
							
	                       </script>
	                       
	                       <?php } ?>
	                       <tr>
	                            	<td colspan="3"><strong>Previous Balance</strong></td>
	                                <td colspan="5"><input id="p_balance" name="p_balance" style="width:180px;" type="text"/></td>
	                               
	                       </tr>
	                       <tr> 
	                       	<td colspan="3"><strong>Output CGST (%)</strong></td>
										
								 <td colspan="5"><input id="outputVAT" name="outputVAT" style="width:180px;" type="text"/></td>
					
							</tr>
							 <tr> 
	                       	<td colspan="3"><strong>Output SGST (%)</strong></td>
										
								 <td colspan="5"><input id="outputSAT" name="outputSAT" style="width:180px;" type="text"/></td>
					
							</tr>
	                       <tr>
	                            	<td colspan="3"><strong>Total</strong></td>
	                                <td colspan="3"><input id="total" name="total" style="width:180px;" type="text" required /></td>
	                                	<td colspan="1"><strong>Discount</strong></td>
	                                <td  colspan="1">
	                                	<input type = "text" name="discount" id ="discount" style="width:180px;"  />
	                                </td>
	                       </tr>
	                       <tr>
	                            	<td colspan="3"><strong>Paid</strong></td>
	                                <td colspan="3"><input id="paid" name="paid" style="width:180px;" type="text" required /></td>
	                                 <td colspan="1"><strong>Chalan Number </strong></td>
	                                <td  colspan="1">
	                                	<input type = "text" name="chalan_num" id ="chalan_num" style="width:180px;"  />
	                                </td>
	                       </tr>
	                       <tr>
	                            	<td colspan="3"><strong>Balance</strong></td>
	                                <td colspan="3"><input id="balance" name="balance" style="width:180px;" type="text" /></td>
	                                <td colspan="1"><strong>Pay Mode </strong></td>
	                                <td  colspan="1">
	                                	<select name="pay_mode" id="pay_mode" style="width:180px;" > 
	                                	<option value="Cash">Cash</option> 
	                                	<option value="Cheque">Cheque</option> 
	                                	</select>
	                                </td>
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